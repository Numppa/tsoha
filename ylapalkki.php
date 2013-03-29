<?php
require_once 'ohjaus.php';
require_once 'Kyselyt.php';

$nimi = $kyselija->hae_nimi($sessio->id);
echo '<p>';
echo $nimi . ' ';
echo '<a href="ulos.php">kirjaudu ulos</a>';
echo '</p>';

?>
