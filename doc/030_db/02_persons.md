## 少女テーブル

### 概要

魔法少女候補である少女のデータを保持するテーブル。

### カラム定義

<!-- dbdoc-persons-column-info Start -->

| No | 名前          | 型          | 主キー | 必須 | 初期値 | AI | US |
|:---|:--------------|:------------|:------:|:----:|:-------|:--:|:--:|
| 1  | id            | INT         |   ○    |  ○   |        | ○  |    |
| 2  | name          | VARCHAR(20) |        |  ○   |        |    |    |
| 3  | age           | INT         |        |  ○   | 0      |    |    |
| 4  | status        | INT         |        |  ○   | 0      |    |    |
| 5  | reliability   | VARCHAR(5)  |        |  ○   |        |    |    |
| 6  | expectation   | INT         |        |  ○   | 0      |    |    |
| 7  | hope          | INT         |        |  ○   | 0      |    |    |
| 8  | uncleanness   | INT         |        |  ○   | 0      |    |    |
| 9  | contracted_at | DATE        |        |      |        |    |    |
| 10 | created       | DATETIME    |        |  ○   |        |    |    |
| 11 | modified      | DATETIME    |        |  ○   |        |    |    |

__AI__ =AutoIncrement / __US__ =Unsigned

<!-- dbdoc-column-ordered-list-template
1. id
2. name
3. age
4. status
5. reliability
6. expectation
7. hope
8. uncleanness
9. contracted_at
10. created
11. modified
dbdoc-column-ordered-list-template -->


<!-- dbdoc-persons-column-info End -->

#### カラム詳細

1. id

    レコードを一意に指定するID。

2. name ( **名前** )

    少女の名前。

3. age ( **年齢** )

    魔法少女候補の年齢。

4. status ( **ステータス** )

    少女の状態を保持する。

    内容は「ステータス一覧」を参照

5. reliability ( **契約確度** )

    契約交渉時の成約確度を保持する。

    取り得る状態は以下の5段階とする。

    - A：成約確実
        - 対象者が明確に契約の意思を示した状態。
    - B：強い「願い」あり
        - 契約の動機となり得る強い「願い」がある状態。
    - C：「願い」あり
        - 漠然とした「願い」がある状態。
    - D：「願い」無し
        - 契約に対して明確な拒絶の意思は無いが、「願い」も無い状態。
    - E：契約意思無し
        - 契約に対して明確に拒絶の意思を示す状態。

6. expectation ( **見込み値** )

    最終的に得られると考えられるエネルギーの見込み値。

7. hope ( **希望値** )

    魔法少女候補が抱く希望を数値化した値。

8. uncleanness ( **穢れ値** )

    ソウルジェムの汚れを数値化した値。

    本項目は魔法少女候補との契約が成立し、魔法少女となった以降に更新可能となる。

9. contracted_at ( **契約日次** )

    契約が成立した日付。

    魔法少女候補の登録時はNullがセットされる。

    契約成立登録を行った際に画面上で入力された値をセットする。

### インデックス

<!-- dbdoc-persons-index-info Start -->

| No | インデックス   | 主キー | ユニーク |
|:---|:---------------|:------:|:--------:|
| 1  | PRIMARY ( id ) |   ○    |    ○     |


<!-- dbdoc-persons-index-info End -->

### 外部キー

<!-- dbdoc-persons-fkey-info Start -->



<!-- dbdoc-persons-fkey-info End -->

<!-- Don't remove the following comments. -->
<!-- dbdoc-persons-marker-label -->