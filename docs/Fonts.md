# Intro to Variable Fonts

Benefits of variable fonts:

* Multiple font weights are essentially being served in a single file. Ideally, resulting in fewer font requests and smaller file size of overall font.

See the benefits from good old Google: [Variable Fonts](https://fonts.google.com/knowledge/glossary/variable_fonts)

## Why `.woff2` and not `.ttf`?

[Better compression!](https://gist.github.com/sergejmueller/cf6b4f2133bcb3e2f64a)

## Why host locally?

Because the WordPress Webfonts API only supports locally hosted files right now, but specifying 3rd party sources may be coming (post WP 6.0). (See [Webfonts: Add internal-only theme.json webfonts handler - WP 6.0 stopgap](https://github.com/WordPress/gutenberg/pull/40493) for context)

## Working with Google Fonts

## Resources

* Original guidance from Henry.codes: ["How to convert variable ttf font files to woff2"](https://henry.codes/writing/how-to-convert-variable-ttf-font-files-to-woff2/)
* Google Fonts: ["Loading variable fonts on the web"](https://fonts.google.com/knowledge/using_type/loading_variable_fonts_on_the_web)
