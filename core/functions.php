<?php
function checksession() { 
    if(!isset($_SESSION['name'])) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    exit('<h1>403 Forbidden</h1><p>Перейти к <a href="index.php">форме авторизации</a></p>');
    }
}

function checksessionadmin() { 
    if(!isset($_SESSION['name']) or $_SESSION['role'] != 'administrator') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    exit('<h1>403 Forbidden</h1><p>Перейти к <a href="index.php">форме авторизации</a></p>');
    } 
}

function testdir(){
    $dir = 'tests';
    $tests = scandir($dir);
}

function upload() {
    if (!empty($_FILES) && array_key_exists('test', $_FILES)) {
        $filename=date("G-i-s");
        if (move_uploaded_file($_FILES['test']['tmp_name'], "./tests/$filename.json")) header('Location: list.php');
       }
       
}

?>