<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規作成</title>
</head>
<body>
  <form action="store.php" method="post">
    <input type="text" name="content" >
    <!-- inputタグのname属性がキーとなり
     value属性がバリューとなるような連想配列として
     $_POSTに格納される -->

     <!-- $_POSTとは？
$_POSTは、PHPが最初から用意してくれている「スーパーグローバル変数」の一つで、
HTMLフォームでmethod="post"として送信されたデータを受け取るための連想配列 -->


<!-- get 　読み取り専用な機能　GETを使うとどのような処理をしていたとしてもクライアントには安全なAPI
　　　post　　登録処理や更新処理などの、書き込みがありリソースが更新される可能性のある処理

スーパーグローバル変数の性質
PHPが最初から用意している特別な連想配列の変数で、
どこからでも（関数内でも）アクセスできます。

$_POST や $_GET は、なぜスーパーグローバル変数として使われるのか？
PHPがHTTPリクエストを解析し、グローバルに使いやすくしている

$_POST や $_GET は、外部から渡ってくる入力値として扱うものであり、常にアクセス可能である必要がある

global 宣言をしなくても、関数内・クラス内など任意のスコープで直接アクセス可能である

フォームやURLなどから送られてくるデータは「名前（キー）」と「値」がセットになっているので、
それを扱うのに連想配列が最も適している

-->

    <input type="submit" value="作成">
  </form>


  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
</body>
</html>