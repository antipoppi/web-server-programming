<!DOCTYPE HTML>
<html lang="fi">

<head>
    <title>cbook-addform.php</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="tyyli.css" type="text/css">
</head>

<body>
    <div id='container'>
        <?php include('navbar.php');?>
        <?php echo filled_form();?>
    </div>
</body>

</html>

<?php
/*******************  PHP-toiminnot ******** ***********/

/*******************  Esitäytetty lomake  ********************/
function filled_form() {

    $form = <<<EndOfForm
    <h3>Muokkaa asiakkaan tietoja</h3>

    <div class="boxi">
    <form action="cbook-edit.php" method="post" accept-charset="UTF-8">
      <label for="name">Nimi</label><br>
      <input type="hidden" name="id" value="{$_GET['id']}">
      <input type="text" name="name" value="{$_GET['name']}"><br>
      <label for="birthday">Syntymäpäivä</label><br>
      <input type="text" name="birth_date" value="{$_GET['birth_date']}"><br><br>
      <input type="submit" name="updNappi" value="Tallenna"><br><br>
      <input type="submit" name="delNappi" value="Poista">
    </form>
    </div>
EndOfForm;

    return $form;
}
?>