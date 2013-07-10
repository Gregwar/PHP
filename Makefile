# Dummy makefile to trigger the build script
all: zips
	@php build.php 

redo: zips
	@php build.php clean
	@php build.php

clean:
	@php build.php clean

zips:
	@make -C files/
