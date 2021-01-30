<?php
if(session_id() == '') {
    session_start();
}
// pelaajatunnukset taulukko jossa on "tunnus" => "salasana"
$tunnukset = array(
    "Pertti" => "salasana",
    "Matti" => "PunainenAuto",
    "Kerttu" => "pimpom",
);
// alustetaan errormessage
$errmsg = '';

// tarkistetaan onko syötetty tunnus/salasana oikea
if(isset($_POST['loginButton'])) {
    $arrayID = array_search($_POST['userPwdInput'], $tunnukset);
    // jos kyllä, session saa arvot ja ohjataan etusivulle
    if($arrayID === $_POST['userNameInput']) {
        $_SESSION['is_logged'] = true;
        $_SESSION['uid'] = $arrayID;
        $_SESSION['balance'] = 500;
        header('Location: h03t03-rosvo.php');   
    }
    // muuten ilmoitetaan virheestä
    else {
        $errmsg = '<h1>Tunnus tai salasana on väärin!</h1>';
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Kirjautumislomake</title>
    <?php
    if ($errmsg != '') echo $errmsg;
    ?>
    <!-- Määritetään dokumentin tyylit -->
    <link rel="stylesheet" href="h03t03.css" type="text/css">
</head>

<body>
    <div id='container'>
        <form method="post" action="login.php" id="flog">
            <p>Käyttäjänimi: <input type="text" name="userNameInput"></p>
            <p>Salasana: <input type="password" name="userPwdInput"></p>
            <p><input type="submit" name="loginButton" value="Kirjaudu sisään"></p>
        </form>
    </div>
</body>

</html>