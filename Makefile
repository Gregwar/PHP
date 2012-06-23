# Dummy makefile to trigger the build script
all: zips
	@php build.php 

redo: zips
	@php build clean

zips:
	@make -C files/
