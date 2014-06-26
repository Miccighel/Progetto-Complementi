<?php
include '../settings/configurazione.inc';
include HOME_ROOT.'/html/testa.php';

if (isset($_SESSION['collegato'])){
    if ($_SESSION['amministratore'] == true){
        print '<form id="formInserimentoCategoria" method="post" action="../script/scriptInserimentoCategoria.php">';
        print '<fieldset><legend>Informazioni Categoria</legend>';
        print '<div class="label"><label >Nome</label></div>';
        print '<input type="text" name="nome" class="obbligatorio"></input>';
        print '<input type="submit" value="Conferma" class="invia"></input>';
        print '</fieldset>';
        print "</form>";

        print '<script type="text/javascript">';
        print "gestisciForm('#formInserimentoCategoria','../script/scriptInserimentoCategoria.php','#coldx');";
        print '</script>';

    } else {
        print '<p class="errore">Per poter visualizzare questa pagina devi avere le credenziali da amministratore.</p>';
    }
} else {
    print '<p class="errore">Non sei autorizzato a visualizzare questa pagina, per favore, esegui il login.</p>';
}

include HOME_ROOT.'/html/coda.html';
?>