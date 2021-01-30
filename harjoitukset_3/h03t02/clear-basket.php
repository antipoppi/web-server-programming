<?php
// tyhjentää evästeen arvot ja palaa ostoskori-sivulle
setcookie('car', 0);
setcookie('van', 0);
header('Location: shopping-cart.php');
?>
