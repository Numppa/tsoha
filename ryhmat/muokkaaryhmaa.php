<?php
require_once '../alku.php';
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
require_once '../ylapalkki.php';
onko_kirjautunut(0);
onko_pomo($sessio->id , $_GET['ryhman_id']);

$ryhman_nimi = $kyselija->hae_ryhma($_GET['ryhman_id']);
?>
<p>
    <a href="../index.php">Alkunäkymä</a>-><a href="ryhmanakyma.php?ryhman_id=<?php echo $_GET['ryhman_id']; ?>"><?php echo $kyselija->hae_ryhma($_GET['ryhman_id']); ?></a>->Muokkaa
</p>
<p>
<?php echo 'muokkaa ryhmää ' . $ryhman_nimi; ?>
</p>

<form action="toiminnot/lisaajasen.php" method="post">
    <p>
        Lisää jäsen:
        <br>
        tunnus: 
    <input type="text" name="tunnus">
    <input type="hidden" name="ryhman_id" value="<?php echo $_GET['ryhman_id']; ?>">
    <input type="submit" value="Lisää">
    </p>
</form>

<?php
$jasenet = $kyselija->hae_jasenet($_GET['ryhman_id']);
?>
<table border>
    <p>
    <tr>
        <td>
            tunnus
        </td>
        <td>
            rooli
        </td>
        <td>
            poista rymästä
        </td>
    </tr>
<?php
while ($rivi = $jasenet->fetch()){
?>
<tr>
    <td>
        <?php echo $rivi['tunnus']; ?>
    </td>
    <td>
        <?php echo $rivi['rooli']; ?>
    </td>
    <td>
        <form action="toiminnot/poistaryhmasta.php" method="post">
            <input type="hidden" name="ryhman_id" value="<?php echo $_GET['ryhman_id']; ?>">
            <button type="submit" name="tunnus" value="<?php echo $rivi['tunnus'] ?>">poista</button>
        </form>
    </td>
</tr>
</p>
<?php
}
require_once '../loppu.php';
?>