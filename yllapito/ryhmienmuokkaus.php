<?php
require_once '../ylapalkki.php';
require_once '../ohjaus.php';
onko_kirjautunut(1);

$ryhmat = $kyselija->hae_kaikki_ryhmat();

echo '<table border>';
while ($rivi = $ryhmat->fetch()){
    echo '<tr>';
    echo '<td>' . $rivi['id'] . '</td>';
    echo '<td>' . $rivi['nimi'] . '</td>';
    
    echo '<td> <form action="muokkaaryhmaa.php" method="post">';  
    echo '<input type="submit" name="' . $rivi['id'].'" value="muokkaa"';
    echo '</form>  </td>';
    
    echo '</tr>';
}
echo '</table>';


?>
