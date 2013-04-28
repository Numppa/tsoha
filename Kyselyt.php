<?php

class Kyselyt {

    private $pdo;

    function __construct($yhteys) {
        $this->pdo = $yhteys;
    }

    public function kirjaudu($tunnus, $salasana) {
        $kysely = $this->pdo->prepare('SELECT salasana from kayttajat 
            where ? = tunnus');
        if ($kysely->execute(array($tunnus))) {
            $rivi = $kysely->fetch();
            if ($salasana != $rivi['salasana']) {
                return null;
            }
            return 1;
        }
        return null;
    }

    public function vaihda_salasana($tunnus, $salasana) {
        $kysely = $this->pdo->prepare('update kayttajat set salasana = ?
            where tunnus = ?');
        if ($kysely->execute(array($salasana, $tunnus))) {
            return true;
        }
        return false;
    }

    public function hae_ryhmat($tunnus) {
        $kysely = $this->pdo->prepare('select ryhmat.nimi , ryhmat.id , jasenet.rooli
            from ryhmat , kayttajat , jasenet 
            where jasenet.ryhma = ryhmat.id 
            and kayttajat.tunnus = ? 
            and kayttajat.tunnus = jasenet.tunnus');
        if ($kysely->execute(array($tunnus))) {
            return $kysely;
        }
        return null;
    }

    public function hae_rooli($tunnus) {
        $kysely = $this->pdo->prepare('select rooli from kayttajat where tunnus = ?');
        if ($kysely->execute(array($tunnus))) {
            $array = $kysely->fetch();
            $rooli = $array['rooli'];
            return $rooli;
        }
        return null;
    }

    public function onko_pomo($tunnus, $ryhman_id) {
        $kysely = $this->pdo->prepare('select rooli from jasenet
            where tunnus = ? and ryhma = ?');
        if ($kysely->execute(array($tunnus, $ryhman_id))) {
            $rivi = $kysely->fetch();
            if ($rivi['rooli'] === 'pomo') {
                return true;
            }
        }
        return false;
    }

    public function onko_jasen($tunnus, $ryhman_id) {
        if ($this->hae_jasenyyden_laatu($tunnus, $ryhman_id)) {
            return true;
        }
        return false;
    }

    public function hae_jasenyyden_laatu($tunnus, $ryhman_id) {
        $kysely = $this->pdo->prepare('select rooli from jasenet 
            where tunnus = ? and ryhma = ?');
        if ($kysely->execute(array($tunnus, $ryhman_id))) {
            $array = $kysely->fetch();
            return $array['rooli'];
        }
        return null;
    }

    public function hae_nimi($tunnus) {
        $kysely = $this->pdo->prepare('select nimi from kayttajat where tunnus = ?');
        if ($kysely->execute(array($tunnus))) {
            $array = $kysely->fetch();
            $nimi = $array['nimi'];
            return $nimi;
        }
        return null;
    }

    public function luo_kayttaja($tunnus, $nimi, $salasana, $rooli) {
        $kysely = $this->pdo->prepare('insert into kayttajat values (? , ? , ? , ?)');
        if ($kysely->execute(array($tunnus, $nimi, $salasana, $rooli))) {
            return true;
        }
        return false;
    }

    public function hae_ryhma($id) {
        $kysely = $this->pdo->prepare('select nimi from ryhmat where ? = id');
        if ($kysely->execute(array($id))) {
            $array = $kysely->fetch();
            return $array['nimi'];
        }
        return null;
    }

    public function onko_ryhmaa($nimi) {
        $kysely = $this->pdo->prepare('select nimi from ryhmat where ? = nimi');
        if ($kysely->execute(array($nimi))) {
            return $kysely->fetch();
        }
        return null;
    }

    public function luo_ryhma($nimi) {
        $kysely = $this->pdo->prepare('insert into ryhmat (nimi) values (?)');
        if ($kysely->execute(array($nimi))) {
            return true;
        }
        return false;
    }

    public function hae_kaikki_ryhmat() {
        $kysely = $this->pdo->prepare('select id , nimi from ryhmat');
        if ($kysely->execute()) {
            return $kysely;
        }
        return null;
    }

    public function hae_jasenet($ryhman_id) {
        $kysely = $this->pdo->prepare('select kayttajat.tunnus , jasenet.rooli 
            from jasenet , ryhmat , kayttajat
            where jasenet.tunnus = kayttajat.tunnus
            and jasenet.ryhma = ryhmat.id
            and ryhmat.id = ?');
        if ($kysely->execute(array($ryhman_id))) {
            return $kysely;
        }
        return null;
    }

    public function vaihda_ryhman_nimi($ryhman_id, $uusi_nimi) {
        $kysely = $this->pdo->prepare('update ryhmat set nimi = ? where id = ?');
        if ($kysely->execute(array($uusi_nimi, $ryhman_id))) {
            return true;
        }
        return false;
    }

    public function kayttajan_jasenyys($tunnus, $ryhman_id, $rooli) {
        if (!$this->onko_kayttajaa($tunnus)) {
            return false;
        }
        if ($this->onko_jasen($tunnus, $ryhman_id)) {
            $kysely = $this->pdo->prepare('update jasenet set rooli = ?
                where tunnus = ? and ryhma = ?');
            if ($kysely->execute(array($rooli, $tunnus, $ryhman_id))) {
                return true;
            }
        } else {
            $kysely = $this->pdo->prepare('insert into jasenet (tunnus , ryhma , rooli) values (? , ? , ?)');
            if ($kysely->execute(array($tunnus, $ryhman_id, $rooli))) {
                return true;
            }
        }
        return false;
    }

    public function onko_kayttajaa($tunnus) {
        $kysely = $this->pdo->prepare('select tunnus from kayttajat where tunnus = ?');
        if ($kysely->execute(array($tunnus))) {
            $rivi = $kysely->fetch();
            if (empty($rivi)) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function poista_ryhmasta($ryhman_id, $tunnus) {
        $kysely = $this->pdo->prepare('delete from jasenet where tunnus = ? and ryhma = ?');
        if ($kysely->execute(array($tunnus, $ryhman_id))) {
            return true;
        }
        return false;
    }

    public function hae_kayttajat() {
        $kysely = $this->pdo->prepare('select nimi , tunnus from kayttajat');
        if ($kysely->execute()) {
            return $kysely;
        }
        return null;
    }

    public function poista_kayttaja($tunnus) {
        $kysely = $this->pdo->prepare('delete from nahnyt where tunnus = ?');
        if ($kysely->execute(array($tunnus))) {
            $kysely = $this->pdo->prepare('delete from jasenet where tunnus = ?');
            if ($kysely->execute(array($tunnus))) {
                $kysely = $this->pdo->prepare('delete from kayttajat where tunnus = ?');
                if ($kysely->execute(array($tunnus))) {
                    return true;
                }
            }
        }
        return false;
    }
    
    public function poista_ryhma($ryhman_id){
        $kysely1 = $this->pdo->prepare('delete from nahnyt 
            where exists(
            select 1 from kirjoitukset 
            where nahnyt.kirjoitus = kirjoitukset.id and
            kirjoitukset.ryhma = ?)');
        $kysely2 = $this->pdo->prepare('delete from kommentit where exists(
            select 1 from kirjoitukset 
            where kommentit.kirjoitus = kirjoitukset.id and
            kirjoitukset.ryhma = ?)');
        $kysely3 = $this->pdo->prepare('delete from kirjoitukset where ryhma = ?');
        $kysely4 = $this->pdo->prepare('delete from jasenet where ryhma = ?');
        $kysely5 = $this->pdo->prepare('delete from ryhmat where id = ?');
        $a = array($ryhman_id);
        if ($kysely1->execute($a) && $kysely2->execute($a) &&
                $kysely3->execute($a) && $kysely4->execute($a) &&
                $kysely5->execute($a)){
                    return true;
        }
        return false;
    }

    public function kirjoita($ryhman_id, $tunnus, $aihe, $teksti) {
        $kysely = $this->pdo->prepare('insert into kirjoitukset (ryhma , tunnus , aihe , kirjoitus , luontipaiva , aika) 
            values (? , ? , ? , ? , current_date , current_time)');
        if ($kysely->execute(array($ryhman_id, $tunnus, $aihe, $teksti))) {
            return true;
        }
        return false;
    }

    public function hae_aiheet($ryhman_id) {
        $kysely = $this->pdo->prepare('select id , aihe , luontipaiva from kirjoitukset 
            where ryhma = ?');
        if ($kysely->execute(array($ryhman_id))) {
            return $kysely;
        }
        return null;
    }

    public function hae_teksti($tekstin_id) {
        $kysely = $this->pdo->prepare('select tunnus , aihe , kirjoitus , luontipaiva , aika
            from kirjoitukset where id = ?');
        if ($kysely->execute(array($tekstin_id))) {
            return $kysely->fetch();
        }
        return null;
    }

    public function poista_aihe($tekstin_id) {
        $kysely = $this->pdo->prepare('delete from kommentit where kirjoitus = ?');
        if ($kysely->execute(array($tekstin_id))) {
            $kysely = $this->pdo->prepare('delete from kirjoitukset where id = ?');
            if ($kysely->execute(array($tekstin_id))) {
                return true;
            }
        }
        return false;
    }

    public function hae_kommentit($tekstin_id) {
        $kysely = $this->pdo->prepare('select tunnus , teksti , luontipaiva , aika 
            from kommentit where kirjoitus = ?');
        if ($kysely->execute(array($tekstin_id))) {
            return $kysely;
        }
        return null;
    }

    public function kommentoi($tekstin_id, $tunnus, $kommentti) {
        $kysely = $this->pdo->prepare('insert into kommentit (kirjoitus , tunnus , teksti , luontipaiva , aika) 
            values (? , ? , ? , current_date , current_time)');
        if ($kysely->execute(array($tekstin_id, $tunnus, $kommentti))) {
            return true;
        }
        return false;
    }

    public function hae_nahneet($tekstin_id) {
        $kysely = $this->pdo->prepare('select tunnus from nahnyt
            where kirjoitus = ?');
        if ($kysely->execute(array($tekstin_id))) {
            return $kysely;
        }
        return null;
    }

    public function onko_nahnyt($tunnus, $tekstin_id) {
        $kysely = $this->pdo->prepare('select tunnus from nahnyt
            where tunnus = ? and kirjoitus = ?');
        if ($kysely->execute(array($tunnus, $tekstin_id))) {
            $rivi = $kysely->fetch();
            if (!empty($rivi['tunnus'])) {
                return true;
            }
        }
        return false;
    }

    public function nae_kirjoitus($tunnus, $tekstin_id) {
        if (!$this->onko_nahnyt($tunnus, $tekstin_id)) {
            $kysely = $this->pdo->prepare('insert into nahnyt (tunnus , kirjoitus) 
                values (? , ?)');
            if ($kysely->execute(array($tunnus, $tekstin_id))) {
                return true;
            }
        }
        return false;
    }

}

require dirname(__FILE__) . '/yhteys.php';
$kyselija = new Kyselyt($yhteys);
?>
