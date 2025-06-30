<?php
require_once('functions.php');
//  var_dump($_POST);


// createData($_POST);
// $_POSTとは？
// $_POSTは、PHPが最初から用意してくれている「スーパーグローバル変数」の一つで、
// HTMLフォームでmethod="post"として送信されたデータを受け取るための連想配列です。

// new.phpファイルのinputタグのname属性がキーとなり
// value属性がバリューとなるような連想配列として
// $_POSTに格納される


savePostedData($_POST); // 追記

// createData関数を実行した結果がリダイレクトされる
header('Location: ./index.php');
exit;