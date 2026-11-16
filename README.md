# Extendable

Extendable is a distinct, dynamic block theme designed as a canvas for your next online venture. Sporting multiple style variations, Extendable is the most expressive block theme yet. Go fresh, bold, bohemian or minimal — with a single click.

## Getting Started

To get started with development:

1. Set up a WordPress instance, we recommend [wp-env](https://developer.wordpress.org/block-editor/handbook/tutorials/devenv/) or [Local](https://localwp.com/) as an alternative to docker.
2. Clone / download this repository into your `/wp-content/themes/` directory

## Requirements

- WordPress 6.6+
- PHP 7.4+
- License: [GPLv2](http://www.gnu.org/licenses/gpl-2.0.html) or later

## Coding standards

The theme follows the [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/). Install the tools with `npm ci && composer install`, then:

- `npm run lint` runs every check below; CI runs the same on each pull request.
- `npm run lint:php` checks PHP with PHPCS, WPCS and PHPCompatibilityWP (`phpcs.xml.dist`); `npm run lint:php:fix` fixes what it can.
- `npm run lint:css` checks CSS with Stylelint; `npm run lint:css:fix` fixes what it can.
- `npm run lint:js` checks JavaScript with ESLint and Prettier; `npm run lint:js:fix` fixes what it can.
- `npm run format:check` checks template and part HTML with Prettier; `npm run format` rewrites it.

`assets/css/woocommerce.css`, `assets/css/masteriyo.css`, `assets/css/hide-block-presets.css` and the `retired-names` block in `style.css` are generated from a design source outside this repo, so Stylelint skips them.

## Resources

- [Setting up a development environment](https://developer.wordpress.org/block-editor/handbook/tutorials/devenv/)
- [Block Theme documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview)
- [Global Styles & theme.json documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [The Ultimate Guide to WordPress Block Templates in Gutenberg](https://richtabor.com/gutenberg-block-templates/)
- [A Primer on Full Site Editing for WordPress Theme Developers](https://richtabor.com/full-site-editing/)
