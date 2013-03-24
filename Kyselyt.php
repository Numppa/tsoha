<?php

class Kyselyt {
    private $pdo;
    
    function __construct($yhteys) {
        $this->pdo = $yhteys;
    }

    public function kirjaudu($tunnus, $salasana) {
        $kysely = $this->pdo->prepare('SELECT tunnus , salasana from kayttajat 
            where ? = tunnus and ? = salasana');
        if ($kysely->execute(array($tunnus , $salasana))){
            return $kysely->fetchObject();
        }
        return null;
    }

}
require dirname(__FILE__).'/yhteys.php';
$kyselija = new Kyselyt($yhteys);

?>
