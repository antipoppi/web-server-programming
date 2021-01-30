<?php
// h3t1-basket-session.php
session_start();

// alustetaan muuttujat
if (!isset($_SESSION['car'])) $_SESSION['car'] = 0;
if (!isset($_SESSION['van'])) $_SESSION['van'] = 0;
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>OstosKoriTori</title>
    <!-- Määritetään dokumentin tyylit -->
    <link rel="stylesheet" href="h03t01.css" type="text/css">
</head>

<body>
    <div id='container'>
        <?php include('navbar.php');?>
        <h2>OstosKoriTori</h2>
        <div class="boxi">
            <p style="text-align: center;">Lisää auto ostoskoriin klikkaamalla kuvaa!</p>
            <a href="add-basket.php?id=car"><img src="images/pexels-car.jpg"></a>
            <a href="add-basket.php?id=van"><img src="images/pexels-van.jpg"></a>
        </div>
    </div>
</body>

</html>
