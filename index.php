<?php
require 'Kyselyt.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $kirjautuminen = $kyselija->kirjaudu("admin", "testi");
        if($kirjautuminen){
            echo 'onnistui';
        } else {
            echo 'ei onnistunut';
        }
        
        
        ?>
    </body>
</html>