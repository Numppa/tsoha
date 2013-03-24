<?php
class Sessio{
    function __construct() {
        session_start();
    }
    public function __get($name) {
        
    }

    public function __isset($name) {
        return isset($_SESSION[$name]);
    }

    public function __set($name, $value) {
        
    }

    public function __unset($name) {
        
    }

    
}
?>
