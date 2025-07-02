<?php
// データの受け取り・受け渡し
require_once('connection.php');

// エスケープ処理
function e($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

session_start(); // 追記

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

// SESSIONにtokenを格納する
function setToken()
{
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
}

// SESSIONに格納されたtokenのチェックを行い、SESSIONにエラー文を格納する
function checkToken($token)
{
    if (empty($_SESSION['token']) || ($_SESSION['token'] !== $token)) {
        $_SESSION['err'] = '不正な操作です';
        redirectToPostedPage();
    }
}

function unsetError()
{
    $_SESSION['err'] = '';
}

function redirectToPostedPage()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}





function savePostedData($post)
{
   checkToken($post['token']); // 追記 
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