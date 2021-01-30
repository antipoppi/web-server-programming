<!DOCTYPE HTML>
<html>
<head>
    <title>Harjoitus 2 Tehtävä 4: Hullun nappi</title>
</head>
<body>
<?php
$counter = isset($_GET['counter']) ? $_GET['counter'] : 0;
if(isset($_GET['button'])) {
    $counter++;
    if ($counter == 3){
        $counter = 0;
    }
}
?>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
<p>
<input type="submit" name="button" value="Paina minua">
<input type="hidden" name="counter" value="<?php echo $counter; ?>">
<input type="text" name="message" <?php if ($counter == 1) { echo "value='Yksi kerta riittää!'"; } elseif($counter == 2) { echo "value='Kaksikin on liikaa!'"; } else { echo "value=''";}?>
</p>
</form>
</body>
</html>