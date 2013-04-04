<?php
require_once 'Sessio.php';
require_once 'Kyselyt.php';

function ohjaa($sijainti){
    header("Location: $sijainti");
    exit();
}

function onko_kirjautunut($admin) {
    global $sessio;
    if (!isset($sessio->id)) {
        ohjaa('/tsoha/kirjautumissivu.php');
    }
    if ($admin == 1){
        global $kyselija;
        if ($kyselija->hae_rooli($sessio->id) !== "admin"){
            ohjaa('/tsoha/index.php');
        }
    }
}

?>
