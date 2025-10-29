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
stylesPresets=$(ls styles/**/*.json)
parts=$(ls parts/*.html)
assets=$(ls assets/css/*.css)
fonts=$(ls assets/fonts/**/*.{woff2,txt})
tribeEvents=$(ls tribe-events/*.css)
assetsJs=$(ls assets/js/*.js)

zip -r ./build/extendable.zip \
	$toplevelFiles \
	$themeJson \
	$patterns \
	$templates \
	$parts \
	$styles \
	$stylesPresets \
	$assets \
	$fonts \
	$tribeEvents \
	$assetsJs \

unzip ./build/extendable.zip -d "./build/extendable/"

echo "You've built the theme ✅"
