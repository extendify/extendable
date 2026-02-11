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

	const CLASS_ON = 'ext-animate--on';
	const CLASS_OFF = 'ext-animate--off';
	const OPTIONS = [
		{ value: 'auto', label: __( 'Auto', 'extendable' ) },
		{ value: 'on', label: __( 'On', 'extendable' ) },
		{ value: 'off', label: __( 'Off', 'extendable' ) },
	];

	function addAnimationAttribute( settings, name ) {
		if ( name !== 'core/group' ) {
			return settings;
		}
		return Object.assign( {}, settings, {
			attributes: Object.assign( {}, settings.attributes, {
				extAnimateMode: { type: 'string', default: 'auto' },
			} ),
		} );
	}

	addFilter( 'blocks.registerBlockType', 'ext/animate-attribute', addAnimationAttribute, 10 );

	const withExtAnimateControl = createHigherOrderComponent(
		function ( BlockEdit ) {
			return function ( props ) {
				const { name, attributes, setAttributes, isSelected } = props;

				if ( name !== 'core/group' ) {
					return createElement( BlockEdit, props );
				}

				const mode = attributes.extAnimateMode || 'auto';

				const onChangeMode = function ( nextMode ) {
					let className = ( attributes.className || '' )
						.replace( CLASS_ON, '' )
						.replace( CLASS_OFF, '' )
						.replace( /\s+/g, ' ' )
						.trim();

					if ( nextMode === 'on' ) {
						className = className ? className + ' ' + CLASS_ON : CLASS_ON;
					} else if ( nextMode === 'off' ) {
						className = className ? className + ' ' + CLASS_OFF : CLASS_OFF;
					}

					setAttributes( {
						extAnimateMode: nextMode,
						className: className || undefined,
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
									help: __( 'Auto follows global settings. On or Off applies to this block only.', 'extendable' ),
								},
								OPTIONS.map( function ( opt ) {
									return createElement( ToggleGroupControlOption, {
										key: opt.value,
										value: opt.value,
										label: opt.label,
										showTooltip: true,
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