<?php
require_once('functions.php');
setToken(); // 追記

// edit.php にアクセスした時に
// connection.phpファイルにあるgetTodoTextById関数も実行される。
// 現在の更新前のtodo内容の文字列が表示される。
$todo = getSelectedTodo($_GET['id']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>
<body>
  <?php if (!empty($_SESSION['err'])): ?>
    <p><?= $_SESSION['err']; ?></p> 
  <?php endif; ?> 
  <form action="store.php" method="post">
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">  
    <input type="hidden" name="id" value="<?= e($_GET['id']); ?>">
    <!-- フォームにidを隠し入力として埋め込む
    フォーム送信時に $_POST['id'] に格納される -->

    <input type="text" name="content" value="<?= e($todo); ?>">
    <!-- 現在のcontent（例：牛乳を買う）を表示
    編集後、$_POST['content'] に送られる -->

    <!-- 更新ボタンを押下してファイル遷移して処理実行 -->
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
  <?php unsetError(); ?> 
</body>
</html>