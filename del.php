<?php

unlink($_POST['path']);
header('location: list.php');

?>