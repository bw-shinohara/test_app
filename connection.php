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
// catchの引数がExceptionではなくPDOExceptionという別のクラスになっている。
// なぜ上記のようになっているのかはレビューの際に確認しますので、まずは自分で調べたり仮説を立てたりして説明できるよう準備をしておきましょう。



// new PDO() が内部で自動的に例外（PDOException）をスローするため

// PDO専用のエラーだけを扱うため。より細かく正確なエラーハンドリングができる