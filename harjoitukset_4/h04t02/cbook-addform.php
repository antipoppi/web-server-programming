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
        <?php echo blank_form();?>
    </div>
</body>

</html>


<?php
/*******************  PHP-toiminnot ******** ***********/

/*******************  Tyhjä lomake  ********************/
function blank_form() {

    $form = <<<EndOfForm
    <h3>Lisää asiakas</h3>

    <div class="boxi">
    <form action="cbook-save.php" method="post">
      <label for="name">Nimi</label><br>
      <input type="text" name="name" placeholder="Sukunimi Etunimi"><br>
      <label for="birthday">Syntymäpäivä</label><br>
      <input type="text" name="birth_date" placeholder="vvvv-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"><br><br>
      <input type="submit" name="nappi" value="Tallenna">
    </form>
    </div>
EndOfForm;

    return $form;
}