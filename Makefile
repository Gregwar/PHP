# Dummy makefile to trigger the build script
all: zips
	@php build.php 

redo: zips
	@php build.php clean
	@php build.php

clean:
	@php build.php clean
	make -C files clean

zips:
	@make -C files/
