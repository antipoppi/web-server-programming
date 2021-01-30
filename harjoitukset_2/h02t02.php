<!DOCTYPE HTML>
<html lang="fi">
<head>
    <title>Harjoitus 2 Tehtävä 2</title>
</head>
<body>
<?php
    if(isset($_POST['btnSubmit'])) {
        $selectedColor = $_POST['color'];
        echo "<body style='background-color:{$selectedColor}'>";
    }
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <p>
    <input type="radio" name="color" value="lightyellow" <?php if($_POST['color']==lightyellow) { echo "checked"; } ?>>Keltainen<br>
    <input type="radio" name="color" value="indianred" <?php if($_POST['color']==indianred) { echo "checked"; } ?>>Punainen<br>
    <input type="radio" name="color" value="lightblue" <?php if($_POST['color']==lightblue) { echo "checked"; } ?>>Sininen<br>
    <input type="radio" name="color" value="beige" <?php if($_POST['color']==beige) { echo "checked"; } ?>>Beige<br>
    <input type="radio" name="color" value="silver" <?php if($_POST['color']==silver) { echo "checked"; } ?>>Hopea<br>
    <input type="submit" name="btnSubmit" value="Vaihda väri">
    </p>
</form>
</body>
</html>