<?php
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
require_once '../ylapalkki.php';
onko_kirjautunut(0);

$kirjoitus = $kyselija->hae_teksti($_POST['tekstin_id']);
?>
<form action="toiminnot/poistaaihe.php" method="post">
    <input type="hidden" name="tekstin_id" value="<?php echo $_POST['tekstin_id']; ?>">
    <input type="submit" value="Poista aihe">
</form>
<h1>
    <?php echo $kirjoitus['aihe']; ?>
</h1>
<p>
    <?php echo $kirjoitus['luontipaiva']; ?>
    <?php echo substr($kirjoitus['aika'] , 0 , 5); ?>
</p>
<p1>
    <?php echo $kirjoitus['kirjoitus']; ?>
</p1>
<?php

?>