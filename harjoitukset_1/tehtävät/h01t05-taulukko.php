<title>Taulukko</title>
<?php

// taulukon alustus
$taulukko[] = "Eka rivi";
$taulukko[] = "Toka rivi";
$taulukko[] = "Koka rivi";
$taulukko[] = "Neka rivi";
$taulukko[] = "Vika rivi";
$taulukko[] = "Kuka rivi";
$taulukko[] = "Seka rivi";
$taulukko_lkm = count($taulukko);

// foreach loop
echo "<table style='border: 1px solid black;'>";
foreach ($taulukko as $arvo) {
    $vari = taustaVari();
    echo "<tr><td style='background-color: $vari; padding:15;'>".$arvo."</td></tr>";
}
echo "</table>";

// tulostetaan väliin tyhjä rivi
// tulostan kaksi eri taulukkoa erikseen, koska tehtävänannossa mainitaan taulukkojen tulostamisesta monikossa
// vaikka tosin tehtävänannon kuvassa näyttää, että on tulostettu vain yksi taulukko jonka sisään nämä on tulostettu erikseen
// mutta en usko tällä olevan hirveästi merkitystä, jos loopit ja taustavärit toimivat
echo "<br>";

echo "<table style='border: 1px solid black;'>";
// for loop
for ($i = 0; $i < $taulukko_lkm; $i++) {
    $vari = taustaVari();
    echo "<tr><td style='background-color: $vari; padding:15;'>".$taulukko[$i]."</td></tr>";
}
echo "</table>";

// funktio
function taustaVari(){
    static $counter = 0;
    $counter++;
    $remainder = $counter % 2;
    if ($remainder == 0){
        return "#ff0";
    }
    else{
        return "#fff";
    }
}
?>