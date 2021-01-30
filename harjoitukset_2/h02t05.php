<!DOCTYPE HTML>
<html>
<head>
    <title>Harjoitus 2 Tehtävä 5: Haluatko miljonääriksi?</title>
</head>
<!-- Määritetään dokumentin tyylit -->
<style>
body {
    font-family: Times New Roman;
    background-color: FloralWhite;
}
form {
    margin-left:40px;
}
h1 {
    background: Gold;
    display: inline;
    padding: 3px;
    border-bottom: 1px solid black;
    border-left: 1px solid black;
}
h2 {
    color: #006600;
}
h3 {
    background: rgb(255, 215, 0, .5); #läpinäkyvyys 50%
    display: inline;
    padding: 3px;
    border-bottom: 1px solid black;
    border-left: 1px solid black;
}
div {
    display: inline-block; 
    background-color: rgb(242, 242, 242, .5); 
    margin-left:40px;
    padding: 25px;
}
#nappula {
    margin-left:10px;
}
#vastaus {
    font-weight: bold;
    font-style: italic;
}
#varoitus {
    background: #ffcccc;
    display: inline;
    font-weight:bold;
}
#tulos {
    font-weight: bold;
    text-decoration: underline;
}
</style>
<body>
<?php
// KOMMENTTEJA TEHTÄVÄSTÄ
// Tässä ohjelmassa halusin kokeilla tulostaa menikö vastaus oikein vai väärin kysymysten alapuolelle.
// Tällä tavalla kyllä oikeat vastaukset saa halutessaan selville... Mutta ei anneta sen häiritä.
// Samalla kertailin html-muotoilua. Kokonaisuudessaan opettavainen tehtävä.

// alussa alustetaan muuttujat
$TotalPoints = 0;
$Q3HelpCount = 0;
$Q4HelpCount = 0;
$Nimi = isset($_POST['Nimi']) ? $_POST['Nimi'] : '';
$Nimi = htmlspecialchars($Nimi);
?>
<div>
<h1>Haluatko miljonääriksi?</h1>
<ul>
    <li>Ensimmäisen kysymyksen oikeasta vastauksesta saa 1p.</li> 
    <li>Toiseen kysymykseen on pakko valita yksi vaihtoehto. Oikeasta valinnasta 2p ja väärästä vähennetään 2p.</li>
    <li>Kolmannessa kysymyksessä voi valita 0-3 vastausta. Oikeasta valinnasta/valinnoista 3 pistettä, vääristä valinnoista vähennetään 3p per väärä valinta.</li>
    <li>Neljännessä kysymyksessä voi valita 0-3 vastausta. Oikeasta valinnasta/valinnoista 3 pistettä, vääristä valinnoista vähennetään 3p per väärä valinta.</li>
    <li><b>Voittaaksesi sinun tulee saada täydet 12 pistettä!</b></li>
</ul>
<!-- Kysymys 1 -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <h3>Kysymys 1: Mitä lyhenne PHP tarkoittaa?</h3>
    <p>
    <input type="radio" name="question1" value="1" <?php if($_POST['question1']==1) { echo "checked"; } ?>>Personal Hypertext Processor<br>
    <input type="radio" name="question1" value="2" <?php if($_POST['question1']==2) { echo "checked"; } ?>>Private Home Page<br>
    <input type="radio" name="question1" value="3" <?php if($_POST['question1']==3) { echo "checked"; } ?>>PHP: Hypertext Preprocessor<br>
    </p>
<?php
if(isset($_POST['btnSubmit'])) {
    if ($_POST['question1'] == 3){
        $TotalPoints += 1;
        echo "<p id='vastaus'>Oikein! <b>+1p</b></p>";
    }
    elseif($_POST['question1'] == 2 || $_POST['question1'] == 3){
        echo "<p id='vastaus'>Väärin. <b>0p</b></p>";
    }
    else{
        echo "<p id='vastaus'>Jätit vastaamatta. <b>0p</b></p>";
    }
}
?>
<!-- Kysymys 2 -->
    <h3>Kysymys 2: Kuinka luot taulukon PHP:ssa?</h3>
    <p>
    <select <?php if($_POST['question2'] == "selectOption") { echo "style='background-color:#ffcccc;'";} ?>  name="question2">
    <option value="selectOption" <?php if($_POST['question2'] == "selectOption") { echo "style='background-color:white;'";} ?>>Valitse vastausvaihtoehto</option>
    <option value="option1" <?php if($_POST['question2'] == "selectOption") { echo "style='background-color:white;'";} if($_POST['question2']=="option1") { echo "selected='true';"; } ?> >$computers = array("IBM", "Apple", "Compaq");</option>
    <option value="option2" <?php if($_POST['question2'] == "selectOption") { echo "style='background-color:white;'";} if($_POST['question2']=="option2") { echo "selected='true';"; } ?> >$computers = "IBM", "Apple", "Compaq";</option>
    <option value="option3" <?php if($_POST['question2'] == "selectOption") { echo "style='background-color:white;'";} if($_POST['question2']=="option3") { echo "selected='true';"; } ?> >$computers = array["IBM", "Apple", "Compaq"];</option>
    </select>
    </p>

<?php 
if (isset($_POST['btnSubmit'])) {
    if($_POST['question2'] == "option1"){
        $TotalPoints += 2;
        echo "<p id='vastaus'>Oikein! <b>+2p</b></p>";
    }
    elseif($_POST['question2'] == "option2" || $_POST['question2'] == "option3"){
        $TotalPoints -= 2;
        echo "<p id='vastaus'>Väärin. <b>-2p</b></p>";
    }
}
?>
<!-- Kysymys 3 -->
<h3>Kysymys 3: Kuinka luot funktion oikein PHP:ssa?</h3>
<p>
<input type="checkbox" name="q3input1" value="ON" <?php if(isset($_POST['q3input1'])) { echo "checked='checked'"; } ?>>function myFunction()<br>
<input type="checkbox" name="q3input2" value="ON" <?php if(isset($_POST['q3input2'])) { echo "checked='checked'"; } ?>>new_function myFunction()<br>
<input type="checkbox" name="q3input3" value="ON" <?php if(isset($_POST['q3input3'])) { echo "checked='checked'"; } ?>>create myFunction()<br>
</p>
<?php 
if (isset($_POST['btnSubmit'])) {
    if($_POST['q3input1'] == 'ON') {
        $Q3HelpCount += 3;
    }
    if($_POST['q3input2'] == 'ON'){
        $Q3HelpCount -= 3;
    }
    if($_POST['q3input3'] == 'ON'){
        $Q3HelpCount -= 3;
    }
    echo "<p id='vastaus'>Sait kysymyksestä {$Q3HelpCount}p</p>";
    $TotalPoints += $Q3HelpCount;
}
?>
<!-- Kysymys 4 -->
<h3>Kysymys 4: Miten lisäät muuttujaan ykköseen? </h3>
    <p>
    <input type="checkbox" name="q4input1" value="ON" <?php if(isset($_POST['q4input1'])) { echo "checked='checked'"; } ?>>$muuttuja++;<br>
    <input type="checkbox" name="q4input2" value="ON" <?php if(isset($_POST['q4input2'])) { echo "checked='checked'"; } ?>>$muuttuja =+ 1;<br>
    <input type="checkbox" name="q4input3" value="ON" <?php if(isset($_POST['q4input3'])) { echo "checked='checked'"; } ?>>$muuttuja += 1;
    </p>
<?php 
if (isset($_POST['btnSubmit'])) {
    if($_POST['q4input1'] == 'ON') {
        $Q4HelpCount += 3;
    }
    if($_POST['q4input2'] == 'ON'){
        $Q4HelpCount -= 3;
    }
    if($_POST['q4input3'] == 'ON'){
        $Q4HelpCount += 3;
    }
    echo "<p id='vastaus'>Sait kysymyksestä {$Q4HelpCount}p</p>";
    $TotalPoints += $Q4HelpCount;
}
?>
    <p>Kerro nimesi:</p><input width="50%"; type="text" name="Nimi" value=<?php echo $Nimi; ?>><br>
    <p>
    <input id="nappula" type="submit" name="btnSubmit" value="Tarkista vastaukset">
    </p>
<!--
Alustetaan loppumuuttujat ennen tarkistusta
Sitten tarkistetaan muistettiinhan kakkostehtävässä valita yksi vaihtoehto
Lopuksi tulostetaan yhteenlasketut pisteet sekä ilmoitetaan lopputulos
-->
<?php
$Warning = "<p id='varoitus'>Et valinnut mitään toisessa kysymyksessä!</p><br><p id='varoitus'>Valitse vastaus ja paina uudestaan 'Tarkista vastaukset' -nappia!</p>";
$Victory = <<<EOVoitto
<body style='background-color:#e6ffe6; background-image: url(money.png); background-repeat: no-repeat; background-position: right top; background-attachment: fixed;'>
<!-- img src='money.png' alt='Money' style='position:absolute; top:30px; right:0;' -->
<p id='tulos'>Sait täydet 12 pistettä {$Nimi}!<p>
<h2>Sinä voitit!</h2>
EOVoitto;
$YouLose = "<p id='tulos'>Sait {$TotalPoints}/12p. Hävisit pelin {$Nimi}.</p>";

if (isset($_POST['btnSubmit'])){
    if($_POST['question2'] == "selectOption"){
        echo $Warning;
    }
    else{
        if ($TotalPoints == 12){
            echo $Victory;
        }
        else{
            echo $YouLose;
        }
    }
}
?>
</form>
</div>
</body>
</html>