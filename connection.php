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
// 例外を発生させる処理が書いていない
// ⇒new PDO() が内部で自動的に例外（PDOException）をスローするため

// catchの引数がExceptionではなくPDOExceptionという別のクラスになっている。
// ⇒PDO専用のエラーだけを扱うため。より細かく正確なエラーハンドリングができる


// DBへの操作
function createTodoData($todoText)
// 引数は、$postに格納した連想配列$_POST　さらに$postを格納した変数
{
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

     $stmt = $dbh->query($sql);

    // ② var_dumpで確認！
    var_dump($stmt); // ←ここに書く！！
    exit;
    return $dbh->query($sql)->fetchAll();

    
}