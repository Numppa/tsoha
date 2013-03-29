<?php
require 'Kyselyt.php';
require 'ohjaus.php';

global $kyselija;
$kayttaja = $kyselija->kirjaudu($_POST['tunnus'] , $_POST['salasana']);
if ($kayttaja){
    $sessio->id = $_POST['tunnus'];
    ohjaa('index.php');
} else {
    ohjaa('kirjautumissivu.php');
}


?>
