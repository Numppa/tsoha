<?php
require_once '../ylapalkki.php';
require_once '../ohjaus.php';
onko_kirjautunut(1);
?>
<p>
<form action="lisaakayttaja.php" method="post">
    Nimi 
    <input type="text" name="nimi">
    <br>
    Tunnus 
    <input type="text" name="tunnus">
    <br>
    <input type="radio" name="rooli" value="tavallinen"> Tavallinen
    <input type="radio" name="rooli" value="admin"> Ylläpitäjä
    <br>
    Salasana
    <input type="password" name="salasana">
    <br>
    Salanana uudestaan
    <input type="password" name="uudestaan">
    <br>
    <input type="submit" value="Lisää">
</form>
</p>