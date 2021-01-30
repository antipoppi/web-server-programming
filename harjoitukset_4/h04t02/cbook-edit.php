<?php $errMsg = edit_form(); ?>

<!DOCTYPE HTML>
<html lang="fi">

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
function edit_form() {

    require_once("/home/N4927/db-config/CustomerDb.php");
    $customerObj = new CustomersDb();

    $errMsg = '';
    $success = 0;

    // Datan vastaanotto
    $id         = isset($_POST['id'])           ? $_POST['id']          : '';
    $name       = isset($_POST['name'])         ? $_POST['name']        : '';
    $birth_date = isset($_POST['birth_date'])   ? $_POST['birth_date']  : '';

    // Jos päivitetään tietoja
    if (isset($_POST['updNappi'])) {
        // Alkeellista tarkistusta lisäystä varten
        if (strlen($name)>=1 AND strlen($birth_date)>=1) {
            $success = $customerObj->editCustomer($id, $name, $birth_date);
        }

        if ($success) {
            header("Location: cbook-list.php");
        } else {
            $errMsg = "<p>Tallentamisessa jotain ongelmaa</p>";
            return $errMsg;
        }
    }

    if (isset($_POST['delNappi'])) {
        if (strlen($name)>=1 AND strlen($birth_date)>=1) {
            $success = $customerObj->deleteCustomer($id); // TEE CUSTOMERDB.PHP:HEN DELETECUSTOMER METODI
        }

        if ($success) {
            header("Location: cbook-list.php");
        } else {
            $errMsg = "<p>Poistamisessa jotain ongelmaa</p>";
            return $errMsg;
        }
    }
}