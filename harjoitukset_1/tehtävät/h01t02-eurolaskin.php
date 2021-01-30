<title>Eurolaskin</title>
<form method="get"
      action="<?php echo $_SERVER['PHP_SELF']?>">
Muunnettava euromäärä:<br><input type="text" name="euro" style="text-align:right;" size="10" value="<?php echo $_GET['euro'];?>">€<br>
<input type="submit" name="painike" value="Muunna">
</form>
<?php
$eurot = $_GET['euro'];
$markat = $eurot*5.95;
if (!isset($_GET['painike'])) exit();
echo "{$_GET['euro']}€ on markkoina {$markat}mk";
?>