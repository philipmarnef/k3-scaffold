#!/bin/zsh

setopt extended_glob
rm ./html/public/assets/fonts/* 2>/dev/null
mkdir ./html/public/assets/fonts 2>/dev/null
cp ./src/fonts/*.woff* ./html/public/assets/fonts/
wait
glyphhanger --formats=woff2,woff --subset="$(dirname "$0")/html/public/assets/fonts/*"
wait
rm ./html/public/assets/fonts/^*subset.*
