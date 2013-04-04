<?php
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
onko_kirjautunut();

if (empty($_POST['nimi'])){
    ohjaa('uusiryhma.php');
}
$ryhma = $kyselija->onko_ryhmaa($_POST['nimi']);
if (!empty($ryhma['nimi'])){
    ohjaa('uusiryhma.php');
}
$lisays = $kyselija->luo_ryhma($_POST['nimi']);
if ($lisays){
    ohjaa('ryhmahallinta.php');
} else {
    ohjaa('uusiryhma.php');
}
?>
