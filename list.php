<?php
session_start();
include 'core/functions.php';
checksession(); 
$dir = 'tests';
$tests = scandir($dir);
$i=0;
?>
<html lang="ru">
  <head>
    <title>Тесты</title>
    <meta charset="utf-8">
  </head>
<body>
<table border="0">
<?php
include 'core/testlist.php';
?>
</table>
<?php
if ($_SESSION['role'] == 'administrator')
echo "<p><b><a href='admin.php'>Загрузить новый тест</a></b></p>";
?>
<p><a href="core/logout.php"><h3>ВЫХОД</h3></a></p>