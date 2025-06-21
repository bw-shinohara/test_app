<?php
require_once('connection.php');

function createData($post)
{
  createTodoData($post['content']); 
}


// require_once('functions.php');

// createData($_POST);
// header('Location: ./index.php');


function getTodoList()
{
    return getAllRecords();
}