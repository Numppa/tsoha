<?php
require_once '../alku.php';
require_once '../ohjaus.php';
require_once '../ylapalkki.php';
onko_kirjautunut(0);
onko_jasen($sessio->id, $_GET['ryhman_id']);
?>
<p>
    <a href="../index.php">Alkunäkymä</a>-><a href="ryhmanakyma.php?ryhman_id=<?php echo $_GET['ryhman_id']; ?>"><?php echo $kyselija->hae_ryhma($_GET['ryhman_id']); ?></a>->Uusi viesti
</p>
<p>
<form action="toiminnot/kirjoita.php" method="post">
    Aihe: <input type="text" name="aihe"> 
    <br>
    <textarea name="teksti" rows="10" cols="50">Kirjoita tähän</textarea>
    <br>
    <input type="hidden" name="ryhman_id" value="<?php echo $_GET['ryhman_id']; ?>">
    <input type="submit" value="Lähetä">
</form>
</p>
<?php
require_once '../loppu.php';
?>