<?php
require_once '../alku.php';
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
require_once '../ylapalkki.php';
onko_kirjautunut(1);

$kysely = $kyselija->hae_kayttajat();

?>
<p>
<table border>
<form action="toiminnot/poistakayttaja.php" method="post">
    <tr>
        <td>
            nimi
        </td>
        <td>
            käyttäjätunnus
        </td>
        <td>
            poista käyttäjä
        </td>
    </tr>
<?php
while ($rivi = $kysely->fetch()){
?>
    <tr>
        <td>
            <?php echo $rivi['nimi']; ?>
        </td>
        <td>
            <?php echo $rivi['tunnus']; ?>
        </td>
        <td>
            <button type="submit" name="tunnus" value="<?php echo $rivi['tunnus']; ?>">poista</button>
        </td>
    </tr>
</p>
<?php 
}
require_once '../loppu.php';
?>