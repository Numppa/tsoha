<?php
require_once '../alku.php';
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
require_once '../ylapalkki.php';
onko_kirjautunut(0);

?>
<p>
    <a href="../index.php">Alkunäkymä</a>-><a href="ryhmanakyma.php?ryhman_id=<?php echo $_GET['ryhman_id']; ?>"><?php echo $kyselija->hae_ryhma($_GET['ryhman_id']); ?></a>->Lue/kommentoi
</p>
<?php

$kirjoitus = $kyselija->hae_teksti($_GET['tekstin_id']);
if ($kyselija->onko_pomo($sessio->id , $_GET['ryhman_id'])){
?>
<form action="toiminnot/poistaaihe.php" method="post">
    <input type="hidden" name="tekstin_id" value="<?php echo $_GET['tekstin_id']; ?>">
    <input type="hidden" name="ryhman_id" value="<?php echo $_GET['ryhman_id']; ?>">
    <input type="submit" value="Poista aihe">
</form>
<?php
}
?>
<h1>
    <?php echo $kirjoitus['aihe']; ?>
</h1>
<p>
    <?php echo $kyselija->hae_nimi($kirjoitus['tunnus']); ?>
    <?php echo $kirjoitus['luontipaiva']; ?>
    <?php echo substr($kirjoitus['aika'] , 0 , 5); ?>
</p>
<p id="viesti">
    <?php echo $kirjoitus['kirjoitus']; ?>
</p>
<?php
$kommentit = $kyselija->hae_kommentit($_GET['tekstin_id']);
while ($rivi = $kommentit->fetch()){
echo '<p id="kommentoija">';
echo $kyselija->hae_nimi($rivi['tunnus']) . ' ';
echo $rivi['luontipaiva'];
echo substr($rivi['aika'] , 0 , 5);
echo '</p >';
?>
<p id="kommentti">
    <?php echo $rivi['teksti']; ?>
</p>




<?php
}
?>
<form action="toiminnot/kommentoi.php" method="post">
    <textarea name="kommentti" cols="50" rows="8">Kirjoita kommentti</textarea>
    <br>
    <input type="hidden" name="tekstin_id" value="<?php echo $_GET['tekstin_id']; ?>">
    <input type="submit" value="kommentoi">
</form>
<?php
require_once '../loppu.php';
?>