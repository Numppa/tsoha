<?php
require_once 'ohjaus.php';
require_once 'Kyselyt.php';

$nimi = $kyselija->hae_nimi($sessio->id);
echo '<p>';
echo $nimi . ' ';
echo '<a href="/tsoha/ulos.php">kirjaudu ulos </a>';
echo '<br>';
echo '<a href="/tsoha/asetukset.php">asetukset</a>';
echo '</p>';

?>
