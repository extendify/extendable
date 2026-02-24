(function (wp) {
	'use strict';

	const { registerPlugin } = wp.plugins;
	const { Fragment, useState, useEffect } = wp.element;
	const { __ } = wp.i18n;
	const { 
		SelectControl,
		Notice,
		Spinner,
		Modal
	} = wp.components;
	
	const { PluginSidebarMoreMenuItem } = wp.editSite || wp.editPost || {};
	
	const ANIMATION_TYPES = [
		{ label: __( 'None', 'extendable' ), value: 'none' },
		{ label: __( 'Fade', 'extendable' ), value: 'fade' },
		{ label: __( 'Fade Up', 'extendable' ), value: 'fade-up' },
		{ label: __( 'Zoom In', 'extendable' ), value: 'zoom-in' },
	];

	const ANIMATION_SPEEDS = [
		{ label: __( 'Slow', 'extendable' ), value: 'slow' },
		{ label: __( 'Medium', 'extendable' ), value: 'medium' },
		{ label: __( 'Fast', 'extendable' ), value: 'fast' },
	];

	function AnimationSidebar() {
		const [settings, setSettings] = useState({
			type: 'none',
			speed: 'medium'
		});
		const [isLoading, setIsLoading] = useState(true);
		const [isSaving, setIsSaving] = useState(false);
		const [error, setError] = useState(null);
		const [successMessage, setSuccessMessage] = useState(null);
		const [isModalOpen, setIsModalOpen] = useState(false);

		// Expose function to open modal globally for external triggers
		useEffect(() => {
			window.extendableOpenAnimationModal = () => setIsModalOpen(true);
			return () => {
				delete window.extendableOpenAnimationModal;
			};
		}, []);

		useEffect(() => {
			if (window.ExtendableAnimationSettings && window.ExtendableAnimationSettings.current) {
				setSettings(window.ExtendableAnimationSettings.current);
				setIsLoading(false);
			} else {
				fetchSettings();
			}
		}, []);

		const fetchSettings = async () => {
			try {
				setIsLoading(true);
				setError(null);

				const response = await wp.apiFetch({
					path: '/wp/v2/settings',
				});

				if (response.ext_animation_settings) {
					setSettings(response.ext_animation_settings);
				}
			} catch (err) {
				setError(__('Failed to load animation settings.', 'extendable'));
				console.error('Animation settings fetch error:', err);
			} finally {
				setIsLoading(false);
			}
		};

		const saveSettings = async (newSettings) => {
			try {
				setIsSaving(true);
				setError(null);
				setSuccessMessage(null);

				await wp.apiFetch({
					path: '/wp/v2/settings',
					method: 'POST',
					data: {
						ext_animation_settings: newSettings
					},
				});

				setSettings(newSettings);
				setSuccessMessage(__('Animation settings saved!', 'extendable'));

				window.dispatchEvent(new CustomEvent('extendableAnimationSettingsChanged', {
					detail: { settings: newSettings }
				}));

				setTimeout(() => {
					setSuccessMessage(null);
				}, 5000);

			} catch (err) {
				setError(__('Failed to save animation settings.', 'extendable'));
				console.error('Animation settings save error:', err);
			} finally {
				setIsSaving(false);
			}
		};

		const handleTypeChange = (newType) => {
			const newSettings = { ...settings, type: newType };
			saveSettings(newSettings);
		};

		const handleSpeedChange = (newSpeed) => {
			const newSettings = { ...settings, speed: newSpeed };
			saveSettings(newSettings);
		};

		const isAnimationsEnabled = settings.type && settings.type !== 'none';

		// Ensure required components are available
		if (!PluginSidebarMoreMenuItem) {
			return null;
		}

		return (
			wp.element.createElement(Fragment, {},
				wp.element.createElement(PluginSidebarMoreMenuItem, {
					target: 'extendable-animation-modal',
					icon: 'controls-play',
					isPinnable: false,
					onClick: () => setIsModalOpen(true)
				}, __('Animation Settings', 'extendable')),

					isModalOpen && wp.element.createElement(Modal, {
						title: __('Animation Settings', 'extendable'),
						onRequestClose: () => setIsModalOpen(false),
						shouldCloseOnClickOutside: true,
						style: {
							width: '480px',
							maxWidth: '90vw',
							minHeight: '350px',
							maxHeight: '90vh',
							overflowY: 'auto'
						}
					},
						isLoading ? wp.element.createElement('div', {
							style: { textAlign: 'center', padding: '20px' }
						}, wp.element.createElement(Spinner)) : wp.element.createElement(Fragment, {},

							wp.element.createElement('p', {
								style: { 
									marginTop: '0',
									marginBottom: '24px',
									color: '#757575',
									lineHeight: '1.5'
								}
							}, __('Enable animations across your site. Once enabled, you can manage animations for individual blocks.', 'extendable')),

							wp.element.createElement(SelectControl, {
								label: __('Animation Type', 'extendable'),
								value: settings.type,
								options: ANIMATION_TYPES,
								onChange: handleTypeChange,
								disabled: isSaving,
								help: __('Choose the animation style.', 'extendable')
							}),

							isAnimationsEnabled && wp.element.createElement(SelectControl, {
								label: __('Animation Speed', 'extendable'),
								value: settings.speed,
								options: ANIMATION_SPEEDS,
								onChange: handleSpeedChange,
								disabled: isSaving,
								help: __('Control how fast animations play.', 'extendable')
							}),

							error && wp.element.createElement(Notice, {
								status: 'error',
								isDismissible: false
							}, error),

							successMessage && wp.element.createElement(Notice, {
								status: 'success',
								isDismissible: false
							}, successMessage),
						),

						isSaving && wp.element.createElement('div', {
							style: { textAlign: 'center', marginTop: '10px' }
						},
							wp.element.createElement(Spinner),
							wp.element.createElement('p', { style: { margin: '5px 0 0 0' } }, __('Saving...', 'extendable'))
						)
					)
			)
		);
	}

	registerPlugin('extendable-animation-sidebar', {
		render: AnimationSidebar
	});

})(window.wp);
