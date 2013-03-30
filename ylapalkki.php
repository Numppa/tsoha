<?php
require_once 'ohjaus.php';
require_once 'Kyselyt.php';

$nimi = $kyselija->hae_nimi($sessio->id);
echo '<p>';
echo $nimi . ' ';
echo '<a href="http://jonu.users.cs.helsinki.fi/tsoha/ulos.php">kirjaudu ulos</a>';
echo '</p>';

?>
