<?php
// データの受け取り・受け渡し
require_once('connection.php');

// $postには、$_POSTが格納されている。
// function createData($post)//削除
// {
//   var_dump($post);
// exit();

// $post['content']を引数にすることで
// contentのバリューである入力した文字列が
// connection.phpファイルの$todoTextに格納される
// createTodoData($post['content']); //削除
  // これでデータが創り出され、DBに渡される
// }



function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/new.php':
            createTodoData($post['content']);
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
        case '/index.php': // 追記
            deleteTodoData($post['id']); // 追記
            break; // 追記
        default:
            break;
    }
}

function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);
    // var_dump($urlArray);
    // exit();
    return $urlArray['path'];
    
}




// functions.php にて connection.php に記述した関数を呼び出す関数を実装
function getTodoList()
{
    return getAllRecords();
}

// $_GET['id'] でURLクエリパラメータ（index.phpでURLのパラメータとして渡したid）を取得し、
// それをそのままfunctions.phpのgetSelectedTodo関数に渡してます。
function getSelectedTodo($id)
{
    return getTodoTextById($id); 
}