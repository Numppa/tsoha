<?php
require_once 'Kyselyt.php';
require_once 'ohjaus.php';

$kayttaja = $kyselija->kirjaudu($_POST['tunnus'] , $_POST['salasana']);
if ($kayttaja){
    $sessio->id = $_POST['tunnus'];
    ohjaa('index.php');
} else {
    ohjaa('kirjautumissivu.php');
}


?>
