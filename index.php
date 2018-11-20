<?php
session_start();
unset($_SESSION['name']);   
unset($_SESSION['role']);   
session_destroy(); 
?>
<html lang="ru">
  <head>
    <title>Авторизация</title>
    <meta charset="utf-8">
  </head>
<body>
<p><b>Авторизуйтесь или войдите в как гость:</b></p>
<?php
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
?>
<form action="core/validate.php" method="post">
    <label>логин:</label><br/>
  <input required placeholder="любое имя без пароля" name="login" type="text"><br/>
    <label>пароль:</label><br/>
  <input name="password" type="password"><br/><br/>
  <input type="submit" value="войти"><br/><br/>
</form>
<p><b>

</body>
</html>
<?php
 
 $admins=json_decode(file_get_contents('core/users/' . 'admin' . '.json'), TRUE);
 
} 