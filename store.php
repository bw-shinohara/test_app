<?php
require_once('functions.php');
// var_dump($_POST); 
// exit;
if (!empty($_POST['content'])) {
    createData($_POST);
}

createData($_POST);
header('Location: ./index.php');
exit;