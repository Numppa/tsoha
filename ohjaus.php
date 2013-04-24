<?php

require_once 'Sessio.php';
require_once 'Kyselyt.php';

function ohjaa($sijainti) {
    header("Location: $sijainti");
    exit();
}

function onko_kirjautunut($admin) {
    global $sessio;
    if (!isset($sessio->id)) {
        ohjaa('/tsoha/kirjautumissivu.php');
    }
    if ($admin == 1) {
        global $kyselija;
        if ($kyselija->hae_rooli($sessio->id) !== "admin") {
            ohjaa('/tsoha/index.php');
        }
    }
}

function onko_pomo($tunnus, $ryhman_id) {
    global $kyselija;
    if (!$kyselija->onko_pomo($tunnus, $ryhman_id)) {
        ohjaa('/tsoha/index.php');
    }
}

function onko_jasen($tunnus, $ryhman_id){
    global $kyselija;
    if (!$kyselija->onko_jasen($tunnus , $ryhman_id)){
        ohjaa('/tsoha/index.php');
    }
}
?>
