<?php
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
onko_kirjautunut(0);
require_once '../ylapalkki.php';

?>
<button type="submit" action="uusiviesti.php" method="post" value="<?php echo $_POST['ryhman_id']; ?>">
    kirjoita uusi viesti</button>
