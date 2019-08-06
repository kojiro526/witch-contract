## 交渉履歴テーブル

### 概要

魔法少女候補との契約交渉履歴を保持するテーブル。

1回の交渉を1レコードとして記録する。

### カラム定義

<!-- dbdoc-negotiations-column-info Start -->

| No | 名前          | 型       | 主キー | 必須 | 初期値 | AI | US |
|:---|:--------------|:---------|:------:|:----:|:-------|:--:|:--:|
| 1  | id            | INT      |   ○    |  ○   |        | ○  |    |
| 2  | person_id     | INT      |        |  ○   |        |    |    |
| 3  | negotiated_at | DATE     |        |  ○   |        |    |    |
| 4  | body          | TEXT     |        |  ○   |        |    |    |
| 5  | created       | DATETIME |        |  ○   |        |    |    |
| 6  | modified      | DATETIME |        |  ○   |        |    |    |

__AI__ =AutoIncrement / __US__ =Unsigned

<!-- dbdoc-column-ordered-list-template
1. id
2. person_id
3. negotiated_at
4. body
5. created
6. modified
dbdoc-column-ordered-list-template -->


<!-- dbdoc-negotiations-column-info End -->

1. id

    レコードを一意に指定するID。

2. person_id

    personsテーブルの外部キー。

3. negotiated_at ( **交渉日時** )

    交渉を行った日時。

4. body ( **内容** )

    交渉の内容

### インデックス

<!-- dbdoc-negotiations-index-info Start -->

| No | インデックス            | 主キー | ユニーク |
|:---|:------------------------|:------:|:--------:|
| 1  | PRIMARY ( id )          |   ○    |    ○     |
| 2  | person_id ( person_id ) |        |          |


<!-- dbdoc-negotiations-index-info End -->

### 外部キー

<!-- dbdoc-negotiations-fkey-info Start -->

| No | 外部キー                          | 参照先         | 更新時 | 削除時 |
|:---|:----------------------------------|:---------------|:-------|:-------|
| 1  | negotiations_ibfk_1 ( person_id ) | persons ( id ) |        |        |


<!-- dbdoc-negotiations-fkey-info End -->

<!-- Don't remove the following comments. -->
<!-- dbdoc-negotiations-marker-label -->