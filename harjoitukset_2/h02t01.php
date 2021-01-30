<!DOCTYPE HTML>
<html>
<head>
    <title>Harjoitus 2 Tehtävä 1</title>
</head>
<body>
    <?php 
    if(isset($_POST['btnKerroTunne'])) {
        if($_POST['chkBox1'] == 'ON') {
            echo "<p style='color:blue;'>Väsyttää ankarasti</p>";
        }
        if($_POST['chkBox2'] == 'ON') {
            echo "<p style='color:blue;'>On perjantai</p>";
        }
        if($_POST['chkBox3'] == 'ON') {
            echo "<p style='color:blue;'>Pää on kipeä ankarasti</p>";
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <p>
    <input type="checkbox" name="chkBox1" value="ON" <?php if(isset($_POST['chkBox1'])) { echo "checked='checked'"; } ?>>Väsy<br>
    <input type="checkbox" name="chkBox2" value="ON" <?php if(isset($_POST['chkBox2'])) { echo "checked='checked'"; } ?>>Perjantai<br>
    <input type="checkbox" name="chkBox3" value="ON" <?php if(isset($_POST['chkBox3'])) { echo "checked='checked'"; } ?>>Pää pipi<br>
    <input type="submit" name="btnKerroTunne" value="Kerro tunne"><br>
    </p>
    </form>
</body>
</html>
