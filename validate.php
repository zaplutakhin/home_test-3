<?php
session_start();
$username=json_decode(file_get_contents('login.json'),true);
foreach ($username as $user => $password){

    if ($_POST['login'] == $user and $_POST['password'] == $password){
        $_SESSION['login'] = $user; 
        header('location: list.php');
        }
}


echo 'Неверный логин или пароль';
?>