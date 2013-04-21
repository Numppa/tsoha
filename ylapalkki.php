<?php
require_once 'ohjaus.php';
require_once 'Kyselyt.php';

$nimi = $kyselija->hae_nimi($sessio->id);
?>
<p id="ylapalkki">
    <?php echo $nimi . ' '; ?>
    <a href="/tsoha/ulos.php">kirjaudu ulos </a>
    <br>
    <a href="/tsoha/asetukset.php">asetukset</a>
</p>
<p>
    <a href="/tsoha/index.php">alkuun </a>
</p>


