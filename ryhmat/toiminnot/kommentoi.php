<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);

if ($kyselija->kommentoi($_POST['tekstin_id'], $sessio->id, htmlspecialchars($_POST['kommentti']))){
    ohjaa('../../index.php');
} else {
    echo 'Jotain meni vikaan. Kommenttia ei onnistuttu lisäämään. ';
}

?>
