# Dummy makefile to trigger the build script
all: zips
	@php build.php
	@cp -f interactive.php ./build/
	@cp -f slidey.interactive.js ./build/slidey/js/

redo: zips
	@php build.php clean
	@php build.php

clean:
	@php build.php clean
	make -C files clean

zips:
	@make -C files/
