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
    <input type="submit" value="作成">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
</body>
</html>