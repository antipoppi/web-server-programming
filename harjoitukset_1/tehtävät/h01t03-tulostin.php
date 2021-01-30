<title>Harjoitus 1 tehtävä 3</title>
<form method="get"
      action="<?php echo $_SERVER['PHP_SELF']?>">
Syötä tulostettavien tähtien määrä:<input type="text" name="luku" size="3"><br>
<input type="submit" name="painike" value="Aja tulostusfunktio"><br>
<?php
if (!isset($_GET['painike'])) exit();
$lkm = $_GET['luku'];
printStars((int)$lkm);

function printStars($lkm){
    for ($i = 0; $i < $lkm; $i++) {
        echo "*<br>";
     }
}
?>