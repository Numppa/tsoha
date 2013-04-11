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
<br>
<form action="vaihda_nimea">
    <p>Vaihda ryhmän nimeä:
        <input type="text">
        <input type="submit" name="nimi" value="vaihda nimeä">
    </p>
</form>