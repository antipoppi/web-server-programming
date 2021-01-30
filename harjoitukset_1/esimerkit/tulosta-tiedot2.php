<title>PHP-esimerkki: tulosta-tiedot2.html</title>
<form method="get"
    action="<?php echo $_SERVER['PHP_SELF']?>">
Nimi:<br><input type="text" name="nimi"><br>
Osoite:<br><input type="text" name="osoite"><br>
<input type="submit" name="painike" value="Lähetä">
</form>
<?php
if (!isset($_GET['painike'])) exit();
echo "Terve <strong>{$_GET['nimi']}</strong><br>";
echo "Osoitteesi on <strong>{$_GET['osoite']}</strong><p>";
?>