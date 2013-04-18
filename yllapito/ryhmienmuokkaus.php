<?php
require_once '../alku.php';
require_once '../ylapalkki.php';
require_once '../ohjaus.php';
onko_kirjautunut(1);

$ryhmat = $kyselija->hae_kaikki_ryhmat();


echo '<table border>';
echo '<form method="post" action="muokkaaryhmaa.php">';
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