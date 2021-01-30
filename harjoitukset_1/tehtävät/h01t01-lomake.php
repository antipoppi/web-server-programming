
<?php
$inputPaino = $_POST['paino'];
$verrokkiPaino = $inputPaino-=5;
echo "Sinun painosi on {$_POST['paino']}kg<br>";
echo "Minun painoni on " . $verrokkiPaino . "kg, sinulla taitaa olla paino-ongelmia?";
?>