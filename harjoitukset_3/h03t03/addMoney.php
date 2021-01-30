<?php
if (session_id() == '') {
    session_start();
}
// alustetaan siirrettävä summa-muuttuja
$summa = isset($_POST['transfer']) ? $_POST['transfer'] : '';
$summa = htmlspecialchars($summa);

// kun btnSubmitia on painettu, siirretään summa pelitilille
if (isset($_POST['btnSubmit'])) {
    $_SESSION['balance'] += $summa; 
    header('Location: h03t03-rosvo.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Siirrä rahaa</title>
    <!-- Määritetään dokumentin tyylit -->
    <link rel="stylesheet" href="h03t03.css" type="text/css">
</head>

<body>
    <div id="container">
        <form method="post" action="addMoney.php">
            <p>Siirrä pelitilillesi haluamasi summa: <input type="text" name="transfer" value=""> €</p>
            <p><input id="button" type="submit" name="btnSubmit" value="Siirrä"></p>
        </form>
    </div>
</body>

</html>