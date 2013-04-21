<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(1);

if ($kyselija->poista_ryhmasta($_POST['ryhma'] , $_POST['tunnus'])){
    ohjaa('../ryhmahallinta.php');
} else {
    echo '<p>Käyttäjän poistaminen ryhmästä epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}

?>
