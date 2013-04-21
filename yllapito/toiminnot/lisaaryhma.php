<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(1);

if (empty($_POST['nimi'])){
echo '<p>Ryhmän luominen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
$ryhma = $kyselija->onko_ryhmaa($_POST['nimi']);
if (!empty($ryhma['nimi'])){
echo '<p>Ryhmän luominen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
$lisays = $kyselija->luo_ryhma($_POST['nimi']);
if ($lisays){
    ohjaa('../ryhmahallinta.php');
} else {
echo '<p>Ryhmän luominen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>
