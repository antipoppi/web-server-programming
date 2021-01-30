<?php
if(session_id() == '') {
    session_start();
}

require_once 'Autolaskuri.class.php';
if (empty($_SESSION['autolaskuri'])) {
    $autolaskuri = new Autolaskuri();
}
else {
    $autolaskuri = unserialize($_SESSION['autolaskuri']);
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Autolaskuri</title>
</head>

<body>
    <div style="margin: 4px auto; width: 210px;">
<h3 style=background-color:#fed;color:#000>Autolaskuri</h3>
<?php
$autolaskuri->laskeLkm();
$autolaskuri->naytaLomake();
$autolaskuri->naytaTulokset();
?>
</div>
<?php
$_SESSION['autolaskuri'] = serialize($autolaskuri);
?>
</body>
</html>
