<?php
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
require_once '../ylapalkki.php';
onko_kirjautunut(1);


$ryhman_nimi = $kyselija->hae_ryhma($_POST['id']);
echo '<p>';
echo 'muokkaa ryhmää ' . $ryhman_nimi;
echo '</p>';
?>

