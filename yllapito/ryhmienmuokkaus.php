<?php
require_once '../alku.php';
require_once '../ylapalkki.php';
require_once '../ohjaus.php';
onko_kirjautunut(1);

$ryhmat = $kyselija->hae_kaikki_ryhmat();
?>
<p>
    <a href="../index.php">Ylläpito</a>-><a href="ryhmahallinta.php">Hallitse ryhmiä</a>->Muokkaa ryhmiä
</p>
<table border>
<form method="get" action="muokkaaryhmaa.php">
<?php
while ($rivi = $ryhmat->fetch()){
    ?>
<tr>
<td>
    <?php echo $rivi['id']; ?>
</td>
<td>
    <?php echo $rivi['nimi'] ?>
</td>
    
    <td>  
        <button type="submit" name="id" value="<?php echo $rivi['id']; ?>">muokkaa</button>
    </td>
</tr>
<?php
}
echo '</form> </table>';
require_once '../loppu.php';
?>