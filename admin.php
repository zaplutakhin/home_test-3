<?php
session_start();
if(!isset($_SESSION['login'])) 
header('HTTP/1.0 403 Forbiden'); 
else{

  if (!empty($_FILES) && array_key_exists('test', $_FILES)) {
  $filename=date("G-i-s");
  if (move_uploaded_file($_FILES['test']['tmp_name'], "./tests/$filename.json")) header('Location: list.php');
 }
 echo "<p><h3>Список тестов:</h3></p>";
 $dir = 'tests';
 $tests = scandir($dir);
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
<p><h3>Загрузить тест:</h3></p>
<form action=admin.php method=post enctype=multipart/form-data>
<div>
<input type="file" name="test">
</div>
<input type="submit" name="test">
</form>
</body>
</html>
<?php
}
?>