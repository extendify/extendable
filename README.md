# Extendable

Extendable is a distinct, dynamic block theme designed as a canvas for your next online venture. Sporting multiple style variations, Extendable is the most expressive block theme yet. Go fresh, bold, bohemaian or minimal — with a single click.

## Getting Started

To get started with development:

1. Set up a WordPress instance, we recommend [wp-env](https://developer.wordpress.org/block-editor/handbook/tutorials/devenv/) or [Local](https://localwp.com/) as an alternative to docker.
2. Clone / download this repository into your `/wp-content/themes/` directory

## Requirements

- WordPress 6.0+
- PHP 5.6+
- License: [GPLv2](http://www.gnu.org/licenses/gpl-2.0.html) or later

To optionally run tests locally, you will also need:

- [Node.js](https://nodejs.org/en/)
- [Composer](https://getcomposer.org/)

You can install the test-specific development dependencies by running `npm i && composer install`. The following test commands are then available:

- `npm run lint:css` lints and autofixes where possible the CSS
- `composer run analyze [filename.php]` statically analyzes PHP for bugs
- `composer run lint` checks PHP for syntax errors
- `composer run standards:check` checks PHP for standards errors according to [WordPress coding standards](https://developer.wordpress.org/coding-standards/)
- `composer run standards:fix` attempts to automatically fix errors

## Resources

- [Setting up a development environment](https://developer.wordpress.org/block-editor/handbook/tutorials/devenv/)
- [Block Theme documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview)
- [Global Styles & theme.json documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [The Ultimate Guide to WordPress Block Templates in Gutenberg](https://richtabor.com/gutenberg-block-templates/)
- [A Primer on Full Site Editing for WordPress Theme Developers](https://richtabor.com/full-site-editing/)

