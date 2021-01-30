<?php
// jos GET-id on car, lisätään sen evästeen arvoa yhdellä
$car = $_COOKIE['car'];
$van = $_COOKIE['van'];
if ($_GET['id'] == 'car') {
    $car++;
    setcookie('car', $car);
}
// jos GET-id on van, lisätään sen evästeen arvoa yhdellä
if ($_GET['id'] == 'van') {
    $van++;
    setcookie('van', $van);
}
// palataan etusivulle
header('Location: h03t02-basket-session.php');
?>