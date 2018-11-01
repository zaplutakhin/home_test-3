<?php
session_start();
if(!isset($_SESSION['login'])) 
header('HTTP/1.0 403 Forbiden'); 

else {

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

foreach ($tests as $test){
    if ($test !=='..' and $test!=='.'){
      $testname=json_decode(file_get_contents('tests/'.urlencode($test)), true);
      $name=$testname['0']['testname'];
      ?>
      <tr>
      <td valign="top">
      <?php
      echo "<a href='test.php?test=$test'> $name </a>";
         if ($_SESSION['login'] == 'admin') {
         $deltest[$i]='tests/'.$test;
         ?>
       </td>
       <td valign="top">
        <form action="del.php" method="post">
        <input type="hidden" name="path" value="<?php echo $deltest[$i];?>" >
        <input type="submit" name="delete" value="Удалить">
        </form>
        </td>
        </tr>
         <?php
       }    
   $i++;
}
}
?>
</table>
<?php
if ($_SESSION['login'] == 'admin')
echo "<p><b><a href='admin.php'>Загрузить новый тест</a></b></p>";
}
?>