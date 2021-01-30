<!DOCTYPE HTML>
<html lang="fi">

<head>
    <title>cbook-list.php</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="tyyli.css" type="text/css">
</head>

<body>
    <div id='container'>
    <?php include('navbar.php');?>
    <?php page_content();?>
    </div>
</body>

</html>
<?php
/*******************  PHP-toiminnot ******** ***********/

/***********  Datan hakeminen tietokannasta  ***********/
function page_content() {

    require_once("/home/N4927/db-config/CustomerDb.php");
    $customerObj = new CustomersDb();
    $tyhja_hakusana = '';
    $hakusana = '';

    if (!isset($_POST['searchSubmit'])) {
        $customers = $customerObj->getCustomers($tyhja_hakusana);
    } else {
        $hakusana = $_POST['search'];
        $customers = $customerObj->getCustomers($hakusana);
        
    }
    
    if (count($customers)>=1) {
        echo do_html_table($customers);
    } else { 
        echo "<p>Ei tuloksia hakusanalla {$hakusana}.</p>";
    }
    // var_dump($customers); // ks. tarvittaessa
}

/***********  Asiakaslista HTML-taulukkona  ***********/
function do_html_table($customers) {
    $i = 0;
    $html = "<table>";

    // Otsikkorivi
    $html .= "<tr>";
    foreach ($customers[0] as $key => $value) {    
        // jos i=0 niin, ensimmäinen sarake (ID) jää piiloon
        if ($i == 0) {
            $html .=  "<th style='display:none;'>" . ucfirst($key) . "</th>";
            $i = 1;
        } else { // muut sarakkeet näytetään
            $html .=  "<th>" . ucfirst($key) . "</th>";
        }
    }
    $html .= "</tr>";

    // Tulosrivit
    foreach ($customers as $customer) {    
        $html .= "<tr>" .
                 "<td style='display:none;'>$customer->id</td>" .
                 "<td><a href='cbook-editForm.php?id=$customer->id&name=$customer->name&birth_date=$customer->birth_date'>$customer->name</td>" .
                 "<td>$customer->birth_date</td>" .
                 "<td>$customer->created_at</td>" .
                 "</tr>";
    }
    $html .= "</table>";

    return $html;
}
?>

