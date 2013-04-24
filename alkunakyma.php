<?php
require_once 'alku.php';
require_once 'ohjaus.php';
require_once 'Kyselyt.php';

onko_kirjautunut(0);

require 'ylapalkki.php';

if ($kyselija->hae_rooli($sessio->id) === "admin") {
    ohjaa('yllapito.php');
}
$kysely = $kyselija->hae_ryhmat($sessio->id);
?>
<p>
    Alkunäkymä
</p>
<p>
<table border>
<tr>
    <td>
        Ryhmän nimi
    </td>
    <td>
        Rooli
    </td>
</tr>
<form action="ryhmat/ryhmanakyma.php" method="get">
    <?php
    while ($rivi = $kysely->fetch()) {
        ?>
        <tr>
            <td>
                <button name="ryhman_id" value="<?php echo $rivi['id']; ?>"><?php echo $rivi['nimi']; ?></button>
            </td>
            <td>
                <?php echo $rivi['rooli']; ?>
            </td>
        </tr>
        <?php
    }
    ?>
</form>
</table>
</p>
<?php
require_once 'loppu.php';
?>