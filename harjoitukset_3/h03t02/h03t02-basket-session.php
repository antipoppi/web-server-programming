<?php
// alustetaan evästeen nimet ja arvot sekä luodaan evästeet
$car = isset($_COOKIE['car']) ? $_COOKIE['car'] : 0;
setcookie('car', $car);
$van = isset($_COOKIE['van']) ? $_COOKIE['van'] : 0;
setcookie('van', $van);
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>OstosKoriTori</title>
    <!-- Määritetään dokumentin tyylit -->
    <link rel="stylesheet" href="h03t02.css" type="text/css">
</head>

<body>
    <div id='container'>
        <?php include('navbar.php'); ?>
        <h2>OstosKoriTori</h2>
        <div class="boxi">
            <p style="text-align: center;">Lisää auto ostoskoriin klikkaamalla kuvaa!</p>
            <a href="add-basket.php?id=car"><img src="images/pexels-car.jpg"></a>
            <a href="add-basket.php?id=van"><img src="images/pexels-van.jpg"></a>
        </div>
    </div>
</body>

</html>
