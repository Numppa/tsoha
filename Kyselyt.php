<?php
class Kyselyt {
    private $pdo;
    
    function __construct($yhteys) {
        $this->pdo = $yhteys;
    }

    public function kirjaudu($tunnus, $salasana) {
        $kysely = $this->pdo->prepare('SELECT salasana from kayttajat 
            where ? = tunnus');
        if ($kysely->execute(array($tunnus))){
            $rivi = $kysely->fetch();
            if ($salasana != $rivi['salasana']){
                return null;
            }
            return 1;
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
        $kysely = $this->pdo->prepare('select kayttajat.tunnus , jasenet.rooli 
            from jasenet , ryhmat , kayttajat
            where jasenet.tunnus = kayttajat.tunnus
            and jasenet.ryhma = ryhmat.id
            and ryhmat.id = ?');
        if ($kysely->execute(array($ryhman_id))){
            return $kysely;
        }
        return null;
    }
    
    public function vaihda_ryhman_nimi($ryhman_id , $uusi_nimi){
        $kysely = $this->pdo->prepare('update ryhmat set nimi = ? where id = ?');
        if ($kysely->execute(array($uusi_nimi , $ryhman_id))){
            return true;
        }
        return false;
    }

    public function kayttajan_jasenyys($tunnus , $ryhman_id , $rooli){
        if (!$this->onko_kayttajaa($tunnus)) {
            return false;
        }
        if ($this->onko_jasen($tunnus , $ryhman_id)){
            $kysely = $this->pdo->prepare('update jasenet set rooli = ?
                where tunnus = ? and ryhma = ?');
            if ($kysely->execute(array($rooli , $tunnus , $ryhman_id))){
                return true;
            }
        } else {
            $kysely = $this->pdo->prepare('insert into jasenet (tunnus , ryhma , rooli) values (? , ? , ?)');
            if ($kysely->execute(array($tunnus , $ryhman_id , $rooli))){
                return true;
            }
        }
        return false;
    }
    
    public function onko_kayttajaa($tunnus){
        $kysely = $this->pdo->prepare('select tunnus from kayttajat where tunnus = ?');
        if($kysely->execute(array($tunnus))){
            $rivi = $kysely->fetch();
            if (empty($rivi)) {
                return false;
            }
            return true;
        }
        return false;
    }
    
    public function onko_jasen($tunnus , $ryhman_id){
        $kysely = $this->pdo->prepare('select tunnus from jasenet 
            where tunnus = ? and ryhma = ?');
        if($kysely->execute(array($tunnus , $ryhman_id))){
            $rivi = $kysely->fetch();
            if (empty($rivi)) {
                return false;
            }
            return true;
        }
        return false;
    }
    
    public function poista_ryhmasta($ryhman_id , $tunnus){
        $kysely = $this->pdo->prepare('delete from jasenet where tunnus = ? and ryhma = ?');
        if ($kysely->execute(array($tunnus , $ryhman_id))){
            return true;
        }
        return false;
    }
    
    public function hae_kayttajat(){
        $kysely = $this->pdo->prepare('select nimi , tunnus from kayttajat');
        if ($kysely->execute()){
            return $kysely;
        }
        return null;
    }
    
    public function poista_kayttaja($tunnus){
        $kysely = $this->pdo->prepare('delete from jasenet where tunnus = ?');
        if ($kysely->execute(array($tunnus))){
            $kysely = $this->pdo->prepare('delete from kayttajat where tunnus = ?');
            if ($kysely->execute(array($tunnus))){
                return true;
            }
            return false;
        }
        return false;
    }
}
require dirname(__FILE__).'/yhteys.php';
$kyselija = new Kyselyt($yhteys);

?>
