<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);
onko_pomo($sessio->id , $_POST['ryhman_id']);

if ($kyselija->kayttajan_jasenyys($_POST['tunnus'] , $_POST['ryhman_id'] , 'tavallinen')){
    ohjaa('../muokkaaryhmaa.php?ryhman_id=' . $_POST['ryhman_id']);
}else {
echo '<p>Lisääminen. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>
