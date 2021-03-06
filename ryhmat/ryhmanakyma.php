<?php
require_once '../alku.php';
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
require_once '../ylapalkki.php';
onko_kirjautunut(0);
onko_jasen($sessio->id, $_GET['ryhman_id']);
?>

<p>
    <a href="../index.php">Alkunäkymä</a>-><?php echo $kyselija->hae_ryhma($_GET['ryhman_id']); ?>
</p>

<form action="uusiviesti.php" method="get">
    <input type="hidden" name="ryhman_id" value="<?php echo $_GET['ryhman_id']; ?>">
    <input type="submit" value="Kirjoita uusi viesti">
</form>
<?php
if ($kyselija->onko_pomo($sessio->id , $_GET['ryhman_id'])){
?>
<form action="muokkaaryhmaa.php" method="get">
    <input type="hidden" name="ryhman_id" value="<?php echo $_GET['ryhman_id']; ?>">
    <input type="submit" value="Muokkaa ryhmää">
</form>
<?php
}
?>
<p>
<table border>
    <tr>
        <td>
            Aihe
        </td>
        <td>
            Päivämäärä
        </td>
        <td>
            Lue/kommentoi
        </td>
    </tr>
    <?php
    $aiheet = $kyselija->hae_aiheet($_GET['ryhman_id']);
    while ($rivi = $aiheet->fetch()) {
        ?>
        <tr>
            <td>
                <?php echo $rivi['aihe']; ?>
            </td>
            <td>
                <?php echo $rivi['luontipaiva']; ?>
            </td>
            <td>
                <form action="lue.php" method="get">
                    <input type="hidden" name="tekstin_id" value="<?php echo $rivi['id']; ?>">
                    <input type="hidden" name="ryhman_id" value="<?php echo $_GET['ryhman_id']; ?>">
                    <input type="submit" value="Lue/kommentoi">
                </form>
            </td>
        </tr>
        <?php
    }

    echo '</table>';
    echo '</p>';
    require_once '../loppu.php';
    ?>