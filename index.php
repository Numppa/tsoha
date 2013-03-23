<?php
require 'yhteys.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            try{
                $yhdistaja = new yhteys();
                $yhteys = $yhdistaja->getYhteys();
        } catch (PDOException $e){
            echo $e->getLine();
            die("VIRHE" . $e->getMessage());
        }
        ?>
    </body>
</html>