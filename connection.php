<?php
require_once('config.php');

// PDOクラスのインスタンス化
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

// } catch (PDOException $e) {
// try の中でエラー（＝例外）が発生したら実行。
// PDOException は PDOに関する専用の例外クラス。
// $e はそのエラー情報を持つオブジェクト。PDOExceptionのインスタンス

// メソッドを使えるという事はインスタンスだ
// データ型がオブジェクトなら、なにかのインスタンス





// エラー発生ポイント	new PDO(...) の実行中
// エラー検知（捕捉）ポイント	catch (PDOException $e)
// 検知の仕組み	PHPの例外処理構文（try-catch）
// 実際に検知してる場所	catch の中（ここで $e を使ってメッセージを表示）


// 例外を発生させる処理が書いていない
// ⇒new PDO() が内部で自動的に例外（PDOException）をスローするため

// catchの引数がExceptionではなくPDOExceptionという別のクラスになっている。
// ⇒PDO専用のエラーだけを扱うため。より細かく正確なエラーハンドリングができる





// DBへの操作
function createTodoData($todoText)
// 引数は、$postに格納した連想配列$_POST　さらに$postを格納した変数
{
//   var_dump($todoText);
// exit();
  // $todoTextはstring型

  $dbh = connectPdo();

    // todoというテーブルにレコードを挿入する
    // contentカラムに入力された値を挿入する命令
    $sql = 'INSERT INTO todos (content) VALUES ("' . $todoText . '")';
    $dbh->query($sql);
}


// データの取得
function getAllRecords()
{
    $dbh = connectPdo();

    // データ取得処理なので、SELECT文を使用します
    // todosテーブルから、削除されていない（deleted_at カラムが NULLである）
    // レコードを全件取得する
    
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';

    //  $stmt = $dbh->query($sql);

    // // ② var_dumpで確認！
    // var_dump($stmt); // ←ここに書く！！
    // exit;
    return $dbh->query($sql)->fetchAll();
    // fetchAll()継承　別のクラス（PDOStatementクラス）からの継承　
    // メソッド　オブジェクトのふるまい

    
}
// getAllRecords()はfunctions.phpにて呼び出しが必要




// 更新処理
function updateTodoData($post)
{
    // var_dump($post);
    // exit();
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = "' . $post['content'] . '" WHERE id = ' . $post['id'];
    $dbh->query($sql);
    $stsm = $dbh->query($sql);
    var_dump($stsm);
    exit();

    // queryメソッドの返り値は？？？？
    // PDOStatement オブジェクト　　PDOStatementクラスのインスタンス
}


// $_GET['id'] でURLクエリパラメータ（index.phpでURLのパラメータとして渡したid）を取得し、
// それをそのままfunctions.phpのgetSelectedTodo関数に渡してます。
// （更新前の）現在保存されているTODOの内容を返す
function getTodoTextById($id)
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL AND id = ' .  $id;
    // var_dump($sql);
    // exit();
    $data = $dbh->query($sql)->fetch();
    // 今回は全件じゃない
    // var_dump($data);
    // exit();

    // $dataの連想配列から内容であるcontentだけを返す
    return $data['content'];
}

// fetch();の返り値は？
// 以下のような1行の連想配列である。
// [
//   'id' => 3,
//   'content' => '例：牛乳を買う',
//   'deleted_at' => null
// ]

// なんでわざわざfetchAllじゃなくてfetch();にしてる？
// fetchAllにすると以下のエラーが起こる
// 例　：　Warning: Undefined array key "content" in C:\Users\ysk4n\OneDrive\Desktop\test_app\connection.php on line 121
// 未定義の配列

// fetch　[ 'id' => 3, 'content' => '牛乳を買う' ]　　　　　　1次元
// fetchAll　[ [ 'id' => 1, ... ], [ 'id' => 2, ... ] ]　　　多次元






// 論理削除のDB処理
function deleteTodoData($id)
{
    $dbh = connectPdo();
    $now = date('Y-m-d H:i:s');
    /* ここの処理を考えて記述してください。 */
    $sql = 'UPDATE todos SET deleted_at = "' . $now . '" WHERE id = ' . $id;
    $data = $dbh->query($sql);
    // var_dump($data);
    // exit();

}