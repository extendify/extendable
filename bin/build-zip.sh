#!/bin/bash

# Exit if any command fails.
set -e

# Change to the expected directory.
cd "$(dirname "$0")"
cd ..

# Remove old build directory.
if test -d build;
	then
		rm -r build;
		echo "Removing old build directory 🏢"
	fi

echo "Generating build 🚜"

mkdir -p build

# Build the theme zip
echo "Creating zip 🤐"
toplevelFiles=$(ls *.{txt,php,png,css})
themeJson=$(ls theme.json)
patterns=$(ls patterns/*.php)
templates=$(ls templates/*.html)
styles=$(ls styles/*.json)
stylesPresets=$(find styles -path "*/block-presets/*" -name "*.json")
colorsPresets=$(find styles -path "*/colors/*" -name "*.json")
typographyPresets=$(find styles -path "*/typography/*" -name "*.json")
parts=$(ls parts/*.html)
incFiles=$(ls inc/*.php)
assets=$(ls assets/css/*.css)
fonts=$(ls assets/fonts/**/*.{woff2,txt})
tribeEvents=$(ls tribe-events/*.css)
assetsJs=$(ls assets/js/*.js)
vendorJs=$(find assets/vendor -type f -name "*.js" 2>/dev/null || true)
configJson=$(find assets/config -type f -name "*.json" 2>/dev/null || true)
assetsEditor=$(find assets/editor -type f 2>/dev/null || true)

zip -r ./build/extendable.zip \
	$toplevelFiles \
	$themeJson \
	$patterns \
	$templates \
	$parts \
	$incFiles \
	$styles \
	$stylesPresets \
	$colorsPresets \
	$typographyPresets \
	$assets \
	$fonts \
	$tribeEvents \
	$assetsJs \
	$vendorJs \
	$configJson \
	$assetsEditor \

unzip ./build/extendable.zip -d "./build/extendable/"

echo "You've built the theme ✅"
