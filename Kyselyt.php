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
    
    public function hae_ryhmat($tunnus){
        $kysely = $this->pdo->prepare('SELECT nimi FROM ryhmat , kayttajat , jasenet where jasenet.ryhma = ryhmat.id and kayttajat.tunnus = ? and kayttajat.tunnus = jasenet.tunnus');
        if ($kysely->execute(array($tunnus))){
            return $kysely;
        }
        return null;
    }
    
    public function hae_rooli($tunnus){
        $kysely = $this->pdo->prepare('select rooli from kayttajat where tunnus = ?');
        if ($kysely->execute(array($tunnus))){
            $array = $kysely->fetch();
            $rooli = $array['rooli'];
            return $rooli;
        }
        return null;
    }
    
    public function hae_nimi($tunnus){
        $kysely = $this->pdo->prepare('select nimi from kayttajat where tunnus = ?');
        if ($kysely->execute(array($tunnus))){
            $array = $kysely->fetch();
            $nimi = $array['nimi'];
            return $nimi;
        }
        return null;
    }
    
    public function luo_kayttaja($tunnus , $nimi , $salasana , $rooli){
        $kysely = $this->pdo->prepare('insert into kayttajat values (? , ? , ? , ?)');
        if ($kysely->execute(array($tunnus , $nimi , $salasana , $rooli))){
            return true;
        }
        return false;
    }
    
    public function hae_ryhma($id){
        $kysely = $this->pdo->prepare('select nimi from ryhmat where ? = id');
        if ($kysely->execute(array($id))){
            $array = $kysely->fetch();
            return $array['nimi'];
        }
        return null;
    }

        public function onko_ryhmaa($nimi){
        $kysely = $this->pdo->prepare('select nimi from ryhmat where ? = nimi');
        if ($kysely->execute(array($nimi))){
            return $kysely->fetch();
        }
        return null;
    }
    
    public function luo_ryhma($nimi){
        $kysely = $this->pdo->prepare('insert into ryhmat (nimi) values (?)');
        if ($kysely->execute(array($nimi))){
            return true;
        }
        return false;
    }
    
    public function hae_kaikki_ryhmat(){
        $kysely = $this->pdo->prepare('select id , nimi from ryhmat');
        if ($kysely->execute()){
            return $kysely;
        }
        return null;
    }
    
    public function hae_jasenet($ryhman_id){
        //$kysely = $this->pdo->prepare('select kayttajat.nimi , jasenet.rooli from jasenet , ryhmat , kayttajat , where ');
    }

}
require dirname(__FILE__).'/yhteys.php';
$kyselija = new Kyselyt($yhteys);

?>
