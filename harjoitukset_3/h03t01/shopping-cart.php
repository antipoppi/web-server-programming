<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>OstosKoriTori ostoskori</title>
    <!-- Määritetään dokumentin tyylit -->
    <link rel="stylesheet" href="h03t01.css" type="text/css">
</head>

<body>
    <div id='container'>
        <?php include('navbar.php');?>
        <h2>OstosKoriTorin ostoskorin sisältö</h2>
        <div class="boxi">
            <ul>
                <li><img id="shop_cart_img" src="images/pexels-car.jpg">Car <?php echo $_SESSION['car'];?>kpl</li><br>
                <li><img id="shop_cart_img" src="images/pexels-van.jpg">Van <?php echo $_SESSION['van'];?>kpl</li><br>
                <li><a href="clear-basket.php">Tyhjennä ostoskori</a></li>
            </ul>
        </div>
    </div>
</body>

</html>
