<?php
session_start();
$_SESSION['car'] = 0;
$_SESSION['van'] = 0;
header("Location: shopping-cart.php");
?>