<?php
require_once '../alku.php';
require_once '../ohjaus.php';
require_once '../ylapalkki.php';
onko_kirjautunut(1);
?>
<form action="toiminnot/lisaaryhma.php" method="post">
    <p>
        Ryhmän nimi
        <input type="text" name="nimi">
        <br>
        <input type="submit" value="Lisää ryhmä">
    </p>
</form>
<?php
require_once '../loppu.php';
?>