<!DOCTYPE HTML>
<html lang="fi">
<head>
    <title>Harjoitus 2 Tehtävä 3</title>
</head>
<body>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
<p style="font-style: italic;">Voit valita monta aihetta pitämällä Ctrl-nappia tai vetämällä hiirtä pohjassa</p>
<p>
<!--  Jos taulukko "aiheet[]" sisältää valitut aiheet kyseisen option selected ominaisuus saa arvon true.
      Tällä tavalla saadaan välitettyä tieto, että optio on valittu submit-nappulan painalluksen jälkeen
-->
<select name="aiheet[]" size=3 multiple>
  <option <?php if (in_array("news", $_GET['aiheet']) == true) { echo "selected='true'"; } ?> value="news">Uutiset</option>
  <option <?php if (in_array("music", $_GET['aiheet']) == true) { echo "selected='true'"; } ?> value="music">Musiikki</option>
  <option <?php if (in_array("learn", $_GET['aiheet']) == true) { echo "selected='true'"; } ?> value="learn">Opi uutta</option>
  <input type="submit" name="btnSubmit" value="Tulosta linkit">
</select>
</p>
</form>
<?php
// alla olevassa php-koodissa ensin alustetaan tekstimuuttujat ja tarkistetaan onko aiheet[]-taulukko tyhjä 
// jonka jälkeen tulostetaan linkit jos kyseinen aihe löytyy taulukosta
$tyhjä = "<p>Et valinnut mitään aiheita!</p>";
$uutisLinkit = <<<EOUutiset
<p>Päivän uutiset löydät oheisista linkeistä</p>
<ul><li><a href='https://yle.fi/uutiset/'>YLE Uutiset</a></li>
<li><a href='https://www.bbc.com/news/world/'>BBC World News</a></li></ul>
EOUutiset;
$musaLinkit = <<<EOMusa
<p>Oheisista linkeistä löydät mitä voisit kuunnella</p>
<ul><li><a href='http://everynoise.com/'>Every noise -sivustolta voi etsiä genrejä</a></li>
<li><a href='https://open.spotify.com/'>Spotifyn sivuilta niitä voi taas kuunnella</a></li></ul>
EOMusa;
$oppimisLinkit = <<<EOOpi
<p>Oheisista linkeistä löydät mitä voisit kuunnella</p>
<ul><li><a href='https://en.wikipedia.org/wiki/Special:Random'>Random wikipedia-artikkeli</a></li>
<li><a href='https://www.ted.com/talks/'>TED talks</a></li></ul>
EOOpi;

if(isset($_GET['btnSubmit']))
{
  $selectedAiheet = $_GET['aiheet'];
    if(!isset($selectedAiheet))
    {
      echo $tyhjä;
    }
    if(in_array("news", $selectedAiheet) == true)
    {
      echo $uutisLinkit;
    }
    if(in_array("music", $selectedAiheet) == true)
    {
      echo $musaLinkit;
    }
    if(in_array("learn", $selectedAiheet) == true)
    {
      echo $oppimisLinkit;
    }
}
?>
</body>
</html>