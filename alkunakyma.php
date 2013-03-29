<?php
require_once 'ohjaus.php';
require_once 'Kyselyt.php';

onko_kirjautunut();
require 'ylapalkki.php';


if ($kyselija->hae_rooli($sessio->id) === "admin"){
    ohjaa('yllapito.php');
}

?>
