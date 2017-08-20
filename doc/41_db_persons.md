# 魔法少女候補テーブル（persions）

## 概要

魔法少女候補である少女を保持するテーブル。

## テーブル定義

| Field         | Type        | Null | Key | Default | Extra          |
|:--------------|:------------|:-----|:----|:--------|:---------------|
| id            | int(11)     | NO   | PRI | NULL    | auto_increment |
| name          | varchar(20) | NO   |     | NULL    |                |
| age           | int(11)     | NO   |     | 0       |                |
| status        | int(11)     | NO   |     | 0       |                |
| reliability   | varchar(5)  | NO   |     | NULL    |                |
| expectation   | int(11)     | NO   |     | 0       |                |
| hope          | int(11)     | NO   |     | 0       |                |
| uncleanness   | int(11)     | NO   |     | 0       |                |
| contracted_at | date        | YES  |     | NULL    |                |
| created       | datetime    | NO   |     | NULL    |                |
| modified      | datetime    | NO   |     | NULL    |                |

### id

レコードを一意に指定するID。

### name

魔法少女候補の名前。

### name

魔法少女候補の年齢。

### status

魔法少女候補の状態。

### reliability

契約交渉の確度。

A〜Eの文字列を保持する。

### expectation

最終的に得られると考えられるエネルギーの見込み値。

### hope

魔法少女候補が抱く希望を数値化した値。

### uncleanness

ソウルジェムの汚れを数値化した値。

本項目は魔法少女候補との契約が成立し、魔法少女となった以降に更新可能となる。

### contracted_at

契約が成立した日付。

魔法少女候補の登録時はNullがセットされる。

契約成立登録を行った際に画面上で入力された値をセットする。
