<?php
session_start();
?>
<html lang="ru">
  <head>
    <title>Авторизация</title>
    <meta charset="utf-8">
  </head>
<body>
<?php
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
?>
<form action="validate.php" method="post">
    <label>логин:</label><br/>
  <input name="login" type="text"><br/>
    <label>пароль:</label><br/>
  <input name="password" type="password"><br/><br/>
  <input type="submit" value="войти"><br/><br/>
</form>
</body>
</html>
<?php
    } 