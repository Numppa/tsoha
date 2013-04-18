<?php
require_once '../alku.php';
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
    <?php echo $kyselija->hae_nimi($kirjoitus['tunnus']); ?>
    <?php echo $kirjoitus['luontipaiva']; ?>
    <?php echo substr($kirjoitus['aika'] , 0 , 5); ?>
</p>
<p1>
    <?php echo $kirjoitus['kirjoitus']; ?>
</p1>
<?php
$kommentit = $kyselija->hae_kommentit($_POST['tekstin_id']);
while ($rivi = $kommentit->fetch()){
echo '<p>';
echo $kyselija->hae_nimi($rivi['tunnus']);
echo $rivi['luontipaiva'];
echo substr($rivi['aika'] , 0 , 5);
echo '</p>';
?>
<p2>
    <?php echo $rivi['teksti']; ?>
</p2>




<?php
}
?>
<form action="toiminnot/kommentoi.php" method="post">
    <textarea name="kommentti" cols="50" rows="8">Kirjoita kommentti</textarea>
    <br>
    <input type="hidden" name="tekstin_id" value="<?php echo $_POST['tekstin_id']; ?>">
    <input type="submit" value="kommentoi">
</form>
<?php
require_once '../loppu.php';
?>