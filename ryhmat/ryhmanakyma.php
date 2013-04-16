<?php
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
onko_kirjautunut(0);
require_once '../ylapalkki.php';
?>
<form action="uusiviesti.php" method="post">
    <input type="hidden" name="ryhman_id" value="<?php echo $_POST['ryhman_id']; ?>">
    <input type="submit" value="Kirjoita uusi viesti">
</form>
