( function ( wp ) {
	'use strict';

	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { Fragment, createElement } = wp.element;
	const { __ } = wp.i18n;
	const { InspectorControls } = wp.blockEditor || wp.editor;
	const {
		PanelBody,
		__experimentalToggleGroupControl: ToggleGroupControl,
		__experimentalToggleGroupControlOption: ToggleGroupControlOption,
	} = wp.components;

	const ANIMATIONS_ENABLED = window.ExtendableAnimateControl && window.ExtendableAnimateControl.enabled === '1';
	console.log( 'Animations enabled:', ANIMATIONS_ENABLED );
	const CLASS_ON = 'ext-animate--on';
	const CLASS_OFF = 'ext-animate--off';
	const OPTIONS = [
		{ value: 'on', label: __( 'On', 'extendable' ) },
		{ value: 'off', label: __( 'Off', 'extendable' ) },
	];

	// Class patterns from animations.json that auto-enable animation
	const PRESET_PATTERNS = [
		'is-style-ext-preset--image--natural-1--image-',
		'is-style-ext-preset--group--natural-1--item-card-1--',
		'is-style-ext-preset--button--natural-1--button-',
		'is-style-ext-preset--group--natural-1--header-1',
		'is-style-ext-preset--group--natural-1--footer-1',
		'is-style-ext-preset--media-text--natural-1',
		'is-style-ext-preset--cover--natural-1--cover-overlay-1',
	];

	function hasPresetClass( className ) {
		return PRESET_PATTERNS.some( function ( pattern ) {
			return className.includes( pattern );
		} );
	}

	const withExtAnimateControl = createHigherOrderComponent(
		function ( BlockEdit ) {
			return function ( props ) {
				const { name, attributes, setAttributes, isSelected } = props;

				if ( ! name.startsWith( 'core/' ) ) {
					return createElement( BlockEdit, props );
				}

				const className = attributes.className || '';
				const hasPreset = hasPresetClass( className );
				const hasOffClass = className.includes( CLASS_OFF );
				const mode = hasOffClass
					? 'off'
					: ( className.includes( CLASS_ON ) || hasPreset )
						? 'on'
						: 'off';

				const onChangeMode = function ( nextMode ) {
					let newClassName = ( attributes.className || '' )
						.replace( CLASS_ON, '' )
						.replace( CLASS_OFF, '' )
						.replace( /\s+/g, ' ' )
						.trim();

					if ( nextMode === 'on' ) {
						// Only add ext-animate--on if block doesn't have a preset class
						if ( ! hasPreset ) {
							newClassName = newClassName ? newClassName + ' ' + CLASS_ON : CLASS_ON;
						}
					} else if ( nextMode === 'off' ) {
						newClassName = newClassName ? newClassName + ' ' + CLASS_OFF : CLASS_OFF;
					}

					setAttributes( {
						className: newClassName || undefined,
					} );
				};

				return createElement(
					Fragment,
					null,
					createElement( BlockEdit, props ),
					isSelected && createElement(
						InspectorControls,
						null,
						createElement(
							PanelBody,
							{ title: __( 'Animation', 'extendable' ), initialOpen: false },
							createElement(
								ToggleGroupControl,
								{
									label: __( 'Animation', 'extendable' ),
									value: mode,
									onChange: onChangeMode,
									isBlock: true,
									help: ANIMATIONS_ENABLED
										? __( 'Enable or disable animation for this block.', 'extendable' )
										: __( 'To use this option, first enable animations globally. Open the Plugins panel and find "Animation Settings".', 'extendable' ),
								},
								OPTIONS.map( function ( opt ) {
									return createElement( ToggleGroupControlOption, {
										key: opt.value,
										value: opt.value,
										label: opt.label,
										showTooltip: true,
										disabled: ! ANIMATIONS_ENABLED,
									} );
								} )
							)
						)
					)
				);
			};
		},
		'withExtAnimateControl'
	);

	addFilter( 'editor.BlockEdit', 'ext/animate-override-ui', withExtAnimateControl, 10 );

} )( window.wp );