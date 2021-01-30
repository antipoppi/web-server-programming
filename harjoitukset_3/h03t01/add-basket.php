<?php
session_start();
$_SESSION[$_GET['id']]++;
header("Location: h03t01-basket-session.php");
?>