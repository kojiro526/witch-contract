# 交渉履歴（negotiations）

## 概要

魔法少女候補との契約交渉履歴を保持するテーブル。

1回の交渉を1レコードとして記録する。

## テーブル定義

| Field         | Type     | Null | Key | Default | Extra          |
|:--------------|:---------|:-----|:----|:--------|:---------------|
| id            | int(11)  | NO   | PRI | NULL    | auto_increment |
| person_id     | int(11)  | NO   | MUL | NULL    |                |
| negotiated_at | date     | NO   |     | NULL    |                |
| body          | text     | NO   |     | NULL    |                |
| created       | datetime | NO   |     | NULL    |                |
| modified      | datetime | NO   |     | NULL    |                |

### id

レコードを一意に指定するID。

### person_id

personsテーブルの外部キー。

### negotiated_at

交渉を行った日時。

### body

交渉の本文
