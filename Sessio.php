<?php
class Sessio{
    function __construct() {
        session_start();
    }
    public function __get($name) {
        if ($this->__isset[$name]){
            return $_SESSION[$name];
        }
        return null;
    }

    public function __isset($name) {
        return isset($_SESSION[$name]);
    }

    public function __set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function __unset($name) {
        unset($_SESSION[$name]);
    }  
}
$sessio = new Sessio();
?>
