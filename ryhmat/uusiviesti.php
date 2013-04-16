<?php
require_once '../ohjaus.php';
onko_kirjautunut(0);
require_once '../ylapalkki.php';
?>
<p>
<form action="toiminnot/kirjoita.php" method="post">
    Aihe: <input type="text" name="aihe"> 
    <br>
    <textarea name="teksti" rows="10" cols="50">Kirjoita tähän</textarea>
    <br>
    <input type="hidden" name="ryhman_id" value="<?php echo $_POST['ryhman_id']; ?>">
    <input type="submit" value="Lähetä">
</form>
</p>