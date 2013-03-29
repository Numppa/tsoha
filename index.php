<?php
require_once 'ohjaus.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>tsoha</title>
    </head>
    <body>
        <?php
        onko_kirjautunut();
        ohjaa('alkunakyma.php');
        ?>
    </body>
</html>