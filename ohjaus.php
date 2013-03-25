<?php
require 'Sessio.php';

function ohjaa($sijainti){
    header("Location: $sijainti");
    exit();
}

function onko_kirjautunut() {
    global $sessio;
    if (!isset($sessio->$kayttaja)) {
        ohjaa('kirjautumissivu.php');
    }
}

?>
