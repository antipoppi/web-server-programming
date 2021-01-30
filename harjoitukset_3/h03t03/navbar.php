<?php
if(session_id() == '') {
    session_start();
}

// alustetaan saldon taustaväri
$vari = '';
if ($_SESSION['balance'] > 100)
    $vari = "greenyellow";

if ($_SESSION['balance'] <= 100 AND $_SESSION['balance'] > 0)
    $vari = "lightyellow";

if ($_SESSION['balance'] <= 0)
    $vari = "lightcoral";

// navigointipalkin saldon taustaväri muuttuu rahatilanteen mukaisesti
$NavbarHTML = <<< EONav
<div id='navbar'>
<p>[Kirjautunut: <span id='id'>{$_SESSION['uid']}</span> ]
[Saldo: <span id='saldo' style='background-color:{$vari}'>{$_SESSION['balance']}€</span> ]
[<a href='addMoney.php'>Siirrä rahaa</a>]
[<a href='logout.php'>Kirjaudu ulos</a>]</p>
</div>
EONav;
echo $NavbarHTML;

?>