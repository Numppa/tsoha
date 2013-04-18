<?php
require_once '../alku.php';
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
onko_kirjautunut(0);
require_once '../ylapalkki.php';
?>
<form action="uusiviesti.php" method="post">
    <input type="hidden" name="ryhman_id" value="<?php echo $_POST['ryhman_id']; ?>">
    <input type="submit" value="Kirjoita uusi viesti">
</form>
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
    $aiheet = $kyselija->hae_aiheet($_POST['ryhman_id']);
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
                <form action="lue.php" method="post">
                    <input type="hidden" name="tekstin_id" value="<?php echo $rivi['id']; ?>">
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