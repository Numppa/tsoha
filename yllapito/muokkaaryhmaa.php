<?php
require_once '../alku.php';
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
require_once '../ylapalkki.php';
onko_kirjautunut(1);

$ryhman_id = $_GET['id'];
$ryhman_nimi = $kyselija->hae_ryhma($ryhman_id);
echo '<p>';
echo 'muokkaa ryhmää ' . $ryhman_nimi;
echo '</p>';
?>
<br>
<form action="toiminnot/nimenvaihto.php" method="post">
    <p>Vaihda ryhmän nimeä:
        <input type="hidden" name="id" value="<?php echo $ryhman_id; ?>">
        <input type="text" name="nimi">
        <input type="submit" value="vaihda nimeä">
    </p>
</form>

<form action="toiminnot/lisaakayttajaryhmaan.php" method="post">
    <p> Lisää ryhmää käyttäjä tai muuta oikeuksia ryhmässä: <br>
        <input type="hidden" name="id" value="<?php echo $ryhman_id; ?>">
        käyttäjätunnus:
        <input type="text" name="tunnus">
        <br>
        <input type="radio" name="rooli" value="tavallinen"> Tavallinen
        <input type="radio" name="rooli" value="pomo"> Ryhmän vetäjä
        <br>
        <input type="submit" value="lisää/muuta">
    </p>
</form>

<?php
$jasenet = $kyselija->hae_jasenet($ryhman_id);
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
            <input type="hidden" name="ryhma" value="<?php echo $ryhman_id; ?>">
            <button type="submit" name="tunnus" value="<?php echo $rivi['tunnus'] ?>">poista</button>
        </form>
    </td>
</tr>
</p>
<?php
}
echo '</table>';
require_once '../loppu.php';
?>