#!/bin/bash

# docxビルドスクリプト
#
# Usage:
#
# 1.  引数を省略するとデフォルトのファイル名は output.docx
#     bash ./build.sh
# 2.  第一引数でファイル名のベースを指定可能。
#     以下のコマンドで生成されるファイルのは mydocx.docx
#     bash ./build.sh mydocx
#
# 注意
# 各種の作図ツールは予めインストールされていること。
# 以下の例で plantuml.jar は ~/bin に格納されているものとする。

NAME_BASE=output
if [ -n "$1" ]; then
  NAME_BASE=$1
  echo -e "NAME_BASE=$NAME_BASE\n"
fi
NAME_OUTPUT=$NAME_BASE.docx

# 図を生成
dot ./**/images/*.dot -Tpng -O
java -jar ~/bin/plantuml.jar ./**/images/*.puml
blockdiag -Tpng --antialias --no-transparency ./**/images/*.blockdiag
seqdiag -Tpng --antialias --no-transparency ./**/images/*.seqdiag
actdiag -Tpng --antialias --no-transparency ./**/images/*.actdiag
nwdiag -Tpng --antialias --no-transparency ./**/images/*.nwdiag

# ビルド用に画像をコピー
rm -rf ./images/*
cp ./**/images/*.png ./images/
cp ./**/images/*.jpg ./images/

# docxファイルをビルド
pandoc ./**/*.md --reference-docx=./template/reference-part.docx --toc --toc-depth=3 -o ./$NAME_OUTPUT
docxtable-php update -f ./$NAME_OUTPUT -s MyTable
