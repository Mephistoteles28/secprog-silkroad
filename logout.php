<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
setcookie('username', '');
setcookie('id', '');
header("Location: login.php");
?>