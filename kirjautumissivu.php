<?php 
require_once 'alku.php';
?>
<p>Kirjaudu sisään</p>
<form action="kirjautumistapahtuma.php" method="post">
    <p>tunnus:
        <input type="text" name="tunnus" id="tunnus">
        <br>
        salasana: 
        <input type="password" name="salasana" id="salasana">
        <br>
        <input type="submit" value="kirjaudu">
    </p>
</form>
<?php
require_once 'loppu.php';
?>