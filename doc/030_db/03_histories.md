## 交渉履歴テーブル

### 概要

魔法少女候補との契約交渉履歴を保持するテーブル。

1回の交渉を1レコードとして記録する。

### テーブル定義

| No | カラム名（論理） | カラム名（物理） | 型       | NULL | 初期値 | その他 |
|---:|:-----------------|:-----------------|:---------|:-----|:-------|:-------|
|  1 | id               | ID               | int(11)  | NO   | NULL   | AI     |
|  2 | person_id        | person_id        | int(11)  | NO   | NULL   |        |
|  3 | negotiated_at    | 交渉日時         | date     | NO   | NULL   |        |
|  4 | body             | 本文             | text     | NO   | NULL   |        |
|  5 | created          | 作成日           | datetime | NO   | NULL   |        |
|  6 | modified         | 更新日           | datetime | NO   | NULL   |        |

**1. ID**

レコードを一意に指定するID。

**2. person_id**

personsテーブルの外部キー。

**3. 契約日時**

交渉を行った日時。

**4. 本文**

交渉の本文
