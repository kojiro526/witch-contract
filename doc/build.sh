#!/bin/bash

java -jar ~/Downloads/plantuml.jar ./**/images/*.puml
rm -rf ./images/*
cp ./**/images/*.png ./images/
pandoc ./**/*.md --reference-docx=../../c92-book/example/ref/reference-sec.docx --toc --toc-depth=3 -o ./spec.docx
docxtable-php update -f ./spec.docx -s MyTable
