<?php
require_once 'alku.php';
require_once 'ylapalkki.php';
require_once 'Kyselyt.php';
require_once 'ohjaus.php';

onko_kirjautunut(1);
?>
<p>
    Ylläpito
</p>
<p>
    <a href="yllapito/kayttajahallinta.php">Hallitse käyttäjiä</a>
    <br>
    <a href="yllapito/ryhmahallinta.php">Hallitse ryhmiä</a>
</p>
<?php
require_once 'loppu.php';
?>