<?php
require_once 'alku.php';
require_once 'ohjaus.php';
require_once 'ylapalkki.php';

onko_kirjautunut(0);
?>
<p>
    <a href="index.php">Alkunäkymä</a>->Asetukset
</p>
<p>
    Vaihda salasana: 
    <br>
<form action="salasananvaihto.php" method="post">
    Vanha salasana: <input type="password" name="vanha"> <br>
    Uusi salasana<input type="password" name="uusi"> <br>
    Salasana uudestaan<input type="password" name="uudestaan"> <br>
    <input type="submit" value="Vaihda salasana">
</form>
</p>
<?php
require_once 'loppu.php';
?>