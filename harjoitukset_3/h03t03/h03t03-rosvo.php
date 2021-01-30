<?php
if(session_id() == '') {
    session_start();
}

if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] !== true) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Yksikätinen rosvo</title>
    <!-- Määritetään dokumentin tyylit -->
    <link rel="stylesheet" href="h03t03.css" type="text/css">
</head>

<body>
    <div id='container'>
        <form method="post" action="h03t03-rosvo.php">
        <?php include('roll.php');?>
            <p>valitse panos: 
            <select name="bet">
                <option value="100" <?php echo (isset($_POST['bet']) && $_POST['bet']==100) ? 'selected="selected"' : '';?> >100€</option>
                <option value="200" <?php echo (isset($_POST['bet']) && $_POST['bet']==200) ? 'selected="selected"' : '';?> >200€</option>
                <option value="300" <?php echo (isset($_POST['bet']) && $_POST['bet']==300) ? 'selected="selected"' : '';?> >300€</option>
            </select>
            <br><br>
            <input id="button" type="submit" name="rollDice" value="Pyöräytä">
            </p>
            <?php if (isset($_POST['rollDice'])) {$_SESSION['balance'] -= $_POST['bet'];} ?>
        </form>
        <p>Voit voittaa panostamasi summan kaksinkertaisesti takaisin!</p>
        <?php include("navbar.php"); ?>
    </div>
</body>

</html>