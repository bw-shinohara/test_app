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
            // var_dump();
            // exit();
            break;

        case '/edit.php':
            updateTodoData($post);
            // var_dump($post);
            // exit();
            break;

        case '/index.php': // 追記
            deleteTodoData($post['id']); // 追記
            // var_dump();
            // exit();
            break; // 追記
            
        default:
            break;
    }
}

function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);
    // $_SERVER['HTTP_REFERER']は、「直前のページのURL」が入っているサーバー変数
    // parse_url() 関数はPHPが最初から用意している「組み込み関数（ビルトイン関数）」
    // URL を解釈し、その構成要素を返す
    // var_dump($urlArray);
    // exit();

    // 連想配列からキーであるpathを返す
    return $urlArray['path'];
    
}




// functions.php にて connection.php に記述した関数を呼び出す関数を実装
function getTodoList()
{
    return getAllRecords();
}

// $_GET['id'] でURLクエリパラメータ（index.phpでURLのパラメータとして渡したid）を取得し、
// それをそのままfunctions.phpのgetSelectedTodo関数に渡してます。
// 現在保存されているTODOの内容を返す
function getSelectedTodo($id)
// edit.phpで呼び出し実行。
{
    return getTodoTextById($id); 
}