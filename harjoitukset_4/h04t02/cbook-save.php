<?php $errMsg = save_form(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>cbook-save.php</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="tyyli.css" type="text/css">
</head>

<body>
    <div id='container'>
    <?php include('navbar.php');?>
    <?php echo $errMsg;?>
    </div>
</body>

</html>

<?php
/*******************  PHP-toiminnot ******** ***********/

/*******************  Tallennetaan tiedot  ********************/
function save_form() {

    require_once("/home/N4927/db-config/CustomerDb.php");
    $customerObj = new CustomersDb();

    $errMsg = '';
    $success = 0;

    // Datan vastaanotto
    $name       = isset($_POST['name'])       ? $_POST['name']       : '';
    $birth_date = isset($_POST['birth_date']) ? $_POST['birth_date'] : '';

    // Alkeellista tarkistusta lisäystä varten
    if (strlen($name)>=1 AND strlen($birth_date)>=1) {
        $success = $customerObj->addCustomer($name, $birth_date);
    }

    if ($success) {
        header("Location: cbook-list.php");
    } else {
        $errMsg = "<p>Tallentamisessa jotain ongelmaa</p>";
        return $errMsg;
    }


}
?>