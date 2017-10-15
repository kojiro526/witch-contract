#!/bin/bash

# 図を生成
java -jar ~/Downloads/plantuml.jar ./**/images/*.puml
blockdiag -Tpng --antialias --no-transparency ./**/images/*.blockdiag
seqdiag -Tpng --antialias --no-transparency ./**/images/*.seqdiag
actdiag -Tpng --antialias --no-transparency ./**/images/*.actdiag
nwdiag -Tpng --antialias --no-transparency ./**/images/*.nwdiag

# ビルド用に画像をコピー
rm -rf ./images/*
cp ./**/images/*.png ./images/

# docxファイルをビルド
pandoc ./**/*.md --reference-docx=../../c92-book/example/ref/reference-sec.docx --toc --toc-depth=3 -o ./spec.docx
docxtable-php update -f ./spec.docx -s MyTable
