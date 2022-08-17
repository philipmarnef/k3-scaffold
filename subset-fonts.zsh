#!/bin/zsh

setopt extended_glob
rm ./html/public/assets/fonts/* 2>/dev/null
mkdir -p ./html/public/assets/fonts 2>/dev/null
cp ./src/fonts/* ./html/public/assets/fonts/
wait
glyphhanger --formats=woff2,woff --subset="$(dirname "$0")/html/public/assets/fonts/*"
wait
rm ./html/public/assets/fonts/^*subset.* 2>/dev/null
