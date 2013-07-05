# Dummy makefile to trigger the build script
all: zips
	@php build.php 

redo: zips
	rm -rf ../php
	@php build.php 

clean:
	rm -rf ../php

zips:
	@make -C files/
