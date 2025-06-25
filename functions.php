<?php
// データの受け取り・受け渡し
require_once('connection.php');

// $postには、$_POSTが格納されている。
function createData($post)
{
  createTodoData($post['content']); 
  // これでデータが創り出され、DBに渡される
}

// functions.php にて connection.php に記述した関数を呼び出す関数を実装
function getTodoList()
{
    return getAllRecords();
}