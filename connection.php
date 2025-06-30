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