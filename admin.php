<?php
session_start();
include 'core/functions.php';
checksessionadmin();
$dir = 'tests';
$tests = scandir($dir);
upload();
?>
 <html lang="ru">
 <head>
   <title>Тесты</title>
   <meta charset="utf-8">
 </head>
<body>
<p><h3>Список тестов:</p></h3>
<table border="0">
<?php
$i=1;
include 'core/testlist.php';
?>
</table>
<p><h3>Загрузить тест:</h3></p>
<form action=admin.php method=post enctype=multipart/form-data>
<div>
<input type="file" name="test">
</div>
<input type="submit" name="test">
</form>
<p><a href="core/logout.php"><h3>ВЫХОД</h3></a></p>
</body>
</html>
