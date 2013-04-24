<?php
require_once '../ohjaus.php';
require_once '../Kyselyt.php';
require_once '../alku.php';
require_once '../ylapalkki.php';
onko_kirjautunut(0);
onko_jasen($sessio->id, $_GET['ryhman_id']);
$henkilot = $kyselija->hae_nahneet($_GET['tekstin_id']);
?>
<a href="../index.php">Alkunäkymä</a>-><a href="ryhmanakyma.php?ryhman_id=
    <?php echo $_GET['ryhman_id']; ?>"><?php echo $kyselija->hae_ryhma($_GET['ryhman_id']); ?></a>-><a href="lue.php?ryhman_id=<?php echo $_GET['ryhman_id']; ?>&tekstin_id=<?php echo $_GET['tekstin_id']; ?>">Lue/kommentoi</a>->Nähneet
    <table border>
        <p>
        <?php
        while ($rivi = $henkilot->fetch()){
        ?>
        <tr>
            <td>
                <?php echo $kyselija->hae_nimi($rivi['tunnus']); ?>
            </td>
        </tr>
        
<?php
        }
        echo '</table>';
        echo '</p>';
require_once '../loppu.php';
?>