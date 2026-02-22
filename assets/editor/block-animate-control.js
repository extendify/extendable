( function ( wp ) {
	'use strict';

	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { Fragment, createElement, useState, useEffect, useCallback, useMemo, useRef } = wp.element;
	const { __ } = wp.i18n;
	const { InspectorControls } = wp.blockEditor || wp.editor;
	const { select } = wp.data;
	const {
		PanelBody,
		__experimentalToggleGroupControl: ToggleGroupControl,
		__experimentalToggleGroupControlOption: ToggleGroupControlOption,
	} = wp.components;
	const CLASS_ON = 'ext-animate--on';
	const CLASS_OFF = 'ext-animate--off';
	const OPTIONS = [
		{ value: 'on', label: __( 'On', 'extendable' ) },
		{ value: 'off', label: __( 'Off', 'extendable' ) },
	];

	let currentGlobalAnimationState = window.ExtendableAnimateControl && window.ExtendableAnimateControl.enabled === '1';
	const existingBlocks = new Set();
	
	// Mark all existing blocks on initial load, so we only auto-enable animation for truly new blocks added
	let hasInitializedExistingBlocks = false;
	function initializeExistingBlocks() {
		if ( hasInitializedExistingBlocks ) {
			return;
		}
		hasInitializedExistingBlocks = true;
		
		const allBlocks = select( 'core/block-editor' ).getBlocks();
		function addBlockIds( blocks ) {
			blocks.forEach( function( block ) {
				existingBlocks.add( block.clientId );
				if ( block.innerBlocks && block.innerBlocks.length > 0 ) {
					addBlockIds( block.innerBlocks );
				}
			} );
		}
		addBlockIds( allBlocks );
	}



	function hasClass( classNameString, targetClass ) {
		if ( ! classNameString ) {
			return false;
		}
		const classes = classNameString.split( /\s+/ );
		return classes.includes( targetClass );
	}

	function addClass( classNameString, classToAdd ) {
		const current = classNameString || '';
		if ( hasClass( current, classToAdd ) ) {
			return current;
		}
		return current ? current + ' ' + classToAdd : classToAdd;
	}

	function removeClass( classNameString, classToRemove ) {
		if ( ! classNameString ) {
			return '';
		}
		return classNameString
			.split( /\s+/ )
			.filter( function ( cls ) {
				return cls !== classToRemove;
			} )
			.join( ' ' )
			.trim();
	}

	const withExtAnimateControl = createHigherOrderComponent(
		function ( BlockEdit ) {
			return function ( props ) {
				const { attributes, setAttributes, isSelected, clientId } = props;

				const [ animationsEnabled, setAnimationsEnabled ] = useState( currentGlobalAnimationState );
				const hasAutoEnabled = useRef( false );

				// Sync with global state when block becomes selected
				useEffect( function () {
					if ( isSelected ) {
						setAnimationsEnabled( currentGlobalAnimationState );
					}
				}, [ isSelected ] );

				// Listen to global animation settings changes
				useEffect( function () {
					const handleSettingsChange = function ( event ) {
						const settings = event.detail.settings;
						const isEnabled = settings && settings.type && settings.type !== 'none';
						currentGlobalAnimationState = isEnabled;
						setAnimationsEnabled( isEnabled );
					};

					window.addEventListener( 'extendableAnimationSettingsChanged', handleSettingsChange );

					return function () {
						window.removeEventListener( 'extendableAnimationSettingsChanged', handleSettingsChange );
					};
				}, [] );

				// Auto-enable animation for newly added blocks (run once per block)
				useEffect( function () {
					if ( hasAutoEnabled.current ) {
						return;
					}
					hasAutoEnabled.current = true;
					initializeExistingBlocks();

					if ( ! animationsEnabled ) {
						return;
					}

					const className = attributes.className || '';
					const hasAnimationClass = hasClass( className, CLASS_ON ) || hasClass( className, CLASS_OFF );
			const isOldBlock = existingBlocks.has( clientId );

			// Only add animation class to new blocks without any animation class
			if ( ! isOldBlock && ! hasAnimationClass ) {
				const newClassName = addClass( className, CLASS_ON );
						setAttributes( {
							className: newClassName,
						} );
					}
				}, [ clientId, attributes.className, animationsEnabled, setAttributes ] );

				const className = attributes.className || '';

			const mode = useMemo( function () {
				const hasOffClass = hasClass( className, CLASS_OFF );
				if ( hasOffClass ) {
					return 'off';
				}
				if ( hasClass( className, CLASS_ON ) ) {
					return 'on';
				}
				return 'off';
			}, [ className ] );

			const onChangeMode = useCallback( function ( nextMode ) {
				let newClassName = removeClass( removeClass( attributes.className || '', CLASS_ON ), CLASS_OFF );

				if ( nextMode === 'on' ) {
					newClassName = addClass( newClassName, CLASS_ON );
				} else if ( nextMode === 'off' ) {
					newClassName = addClass( newClassName, CLASS_OFF );
				}

				setAttributes( {
					className: newClassName || undefined,
				} );
			}, [ attributes.className, setAttributes ] );

			const settingsLink = useMemo( function () {
			return createElement(
				'a',
				{
					href: '#',
					style: { textDecoration: 'underline', cursor: 'pointer', marginInlineStart: '2px' },
					onClick: function( e ) {
						e.preventDefault();
						if ( window.extendableOpenAnimationModal ) {
							window.extendableOpenAnimationModal();
						}
					}
				},
				__( 'Open Animation Global Settings.', 'extendable' )
			);
		}, [] );

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
							help: animationsEnabled
								? createElement(
									'span',
									null,
									__( 'Enable or disable animation for this block.', 'extendable' ),
									settingsLink
								)
								: createElement(
									'span',
									null,
									__( 'Animations are currently disabled.', 'extendable' ),
									settingsLink
								),
						},
				OPTIONS.map( function ( opt ) {
							return createElement( ToggleGroupControlOption, {
								key: opt.value,
								value: opt.value,
								label: opt.label,
								showTooltip: true,
								disabled: ! animationsEnabled,
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