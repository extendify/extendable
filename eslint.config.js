const defaultConfig = require( '@wordpress/scripts/config/eslint.config.cjs' );
const globals = require( 'globals' );

module.exports = [
	...defaultConfig,
	{
		languageOptions: {
			globals: {
				...globals.browser,
			},
		},
	},
];
