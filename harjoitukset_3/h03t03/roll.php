<?php
if(session_id() == '') {
    session_start();
}

// alustetaan muuttujat
$img1 = 0;
$img2 = 0;
$img3 = 0;
$voitto = 0;

if (isset($_POST['rollDice'])) {
    // arvotaan kuville arvot väliltä 1-3
    $img1 = rand(1,3); 
    $img2 = rand(1,3);
    $img3 = rand(1,3);

    $print = <<<EOprint
    <p>
    <img src='images/{$img1}.jpg'>
    <img src='images/{$img2}.jpg'>
    <img src='images/{$img3}.jpg'>
    </p>
EOprint;
    // tarkistetaan onko kaikki kolme kuvaa samat, jos on niin voittaa kaksinkertaisen summan mitä panos
    if ($img1 == $img2 AND $img1 == $img3) {
        $voitto = $_POST['bet'] * 2;
        $_SESSION['balance'] += $voitto;
        echo "<h1>JACKPOT! Voitit $voitto euroa!</h1>";
        // lopuksi tulostetaan kuvat näkyviin
        echo $print;
    }
    // muuten ilmoitetaan häviöstä
    else {
        echo "<h1>Ei voittoa. Hävisit {$_POST['bet']}€</h1>";
        // lopuksi tulostetaan kuvat näkyviin
        echo $print;
    }
}
?>