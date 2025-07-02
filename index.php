<?php //追記
require_once('functions.php'); //あくまで関数参照のため　下に拡張されているだけ
header('Set-Cookie: userId=123'); 
setToken(); //追記
?> 
<!-- 追記 -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
</head>
<body>
   <?php if (!empty($_SESSION['err'])): ?> 
    <p><?= $_SESSION['err']; ?></p> 
  <?php endif; ?> 
  welcome hello world
  <div>
     <a href="new.php">
       <p>新規作成</p>
     </a>
  </div>
  <div> 
    <table>
      <tr>
        <th>ID</th>
        <th>内容</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
       <!-- ↓ここから追記 -->
      <?php foreach (getTodoList() as $todo): ?>
        <!-- getTodoList() as $todo
         asの左辺は全体リスト　右辺はその中の一つ
         fetchAllでtodo全件分ある　右辺には左辺からキーとバリューが代入されている。　
        -->
        <tr>
          <td><?= e($todo['id']); ?></td>
          <td><?= e($todo['content']); ?></td>
          <td>
            <!-- 更新ボタン用リンク -->
            <a href="edit.php?id=<?= e($todo['id']); ?>">更新</a>
          </td>
          <td>
            <!-- 削除用フォーム -->
            <form action="store.php" method="post">
              <input type="hidden" name="id" value="<?= e($todo['id']); ?>">
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>"> 
              <button type="submit">削除</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
       <!-- ↑ここまで -->
    </table>
  </div>
  <?php unsetError(); ?> 
</body>
</html>