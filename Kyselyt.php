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
    
    public function hae_ryhmat($kayttaja_id){
        $kysely = $this->pdo->prepare('SELECT nimi FROM ryhmat');
        
//        if ($kysely->execute(array($kayttaja_id))){
//            return $kysely->fetchObject();
//        }
//        return null;
        return $kysely->fetchObject();
    }
    

}
require dirname(__FILE__).'/yhteys.php';
$kyselija = new Kyselyt($yhteys);

?>
