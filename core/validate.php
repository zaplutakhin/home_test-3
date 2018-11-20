<?php
session_start();
$inputname = $_POST['login'];
if (file_exists('users/' . $inputname . '.json')) {
$admins=json_decode(file_get_contents('users/' . $inputname . '.json'), true);
if ($_POST['login'] == $admins['name'] and $_POST['password'] == $admins['pass']){
    $_SESSION['role'] = $admins['role'];
    $_SESSION['name'] = $admins['name'];
    header ('location: ../list.php'); 
    } else exit ('Неверный пароль администратора'); 
} else {
    $_SESSION['name'] = $_POST['login'];
    $_SESSION['role'] = 'guest';
    header ('location: ../list.php');
}
?>


