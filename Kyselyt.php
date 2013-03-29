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
    
    public function hae_ryhmat($id){
        $kysely = $this->pdo->prepare('SELECT nimi FROM ryhmat , kayttajat , jasenet where jasenet.ryhma = ryhmat.id and kayttajat.tunnus = ? and kayttajat.tunnus = jasenet.tunnus');
        if ($kysely->execute(array($id))){
            return $kysely;
        }
        return null;
    }
    
    public function hae_rooli($id){
        $kysely = $this->pdo->prepare('select rooli from kayttajat where tunnus = ?');
        if ($kysely->execute(array($id))){
            $array = $kysely->fetch();
            $rooli = $array['rooli'];
            return $rooli;
        }
        return null;
    }
    
    public function hae_nimi($id){
        $kysely = $this->pdo->prepare('select nimi from kayttajat where tunnus = ?');
        if ($kysely->execute(array($id))){
            $array = $kysely->fetch();
            $nimi = $array['nimi'];
            return $nimi;
        }
        return null;
    }
    

}
require dirname(__FILE__).'/yhteys.php';
$kyselija = new Kyselyt($yhteys);

?>
