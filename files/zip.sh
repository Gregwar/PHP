#!/bin/bash

INPUT=$1
OUTPUT=$PWD/$2
if [ -e $OUTPUT ]; then
    rm $OUTPUT
fi
cd $INPUT

echo "Zipping $INPUT to $OUTPUT"
zip -r $OUTPUT . > /dev/null
