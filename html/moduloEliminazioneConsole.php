<?php
include '../settings/configurazione.inc';
include HOME_ROOT . '/script/funzioni.php';

if (isset($_SESSION['collegato'])) {
    if ($_SESSION['amministratore'] == true) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            ricercaConsole($_POST['nome'], '../script/scriptEliminazioneConsole.php');
        } else {
            include HOME_ROOT . '/html/testa.php';
            stampaModuloRicerca('moduloEliminazioneConsole.php', 'console');
            include HOME_ROOT . '/html/coda.html';
        }
    } else {
        include HOME_ROOT . '/html/testa.php';
        print '<p class="errore">Per poter visualizzare questa pagina devi avere le credenziali da amministratore.</p>';
        include HOME_ROOT . '/html/coda.html';
    }
} else {
    include HOME_ROOT . '/html/testa.php';
    print '<p class="errore">Non sei autorizzato a visualizzare questa pagina, per favore, esegui il login.</p>';
    include HOME_ROOT . '/html/coda.html';
}
?>