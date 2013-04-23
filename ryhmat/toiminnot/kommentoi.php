<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);

if ($kyselija->kommentoi($_POST['tekstin_id'], $sessio->id, htmlspecialchars($_POST['kommentti']))){
    ohjaa('../lue.php?tekstin_id=' . $_POST['tekstin_id']);
} else {
echo '<p>Kommentin lisääminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>
