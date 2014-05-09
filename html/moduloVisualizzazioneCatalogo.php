<?php
include '../settings/configurazione.inc';
include HOME_ROOT . '/script/funzioni.php';
include HOME_ROOT.'/html/testa.php';

$connessione = creaConnessione(SERVER, UTENTE, PASSWORD, DATABASE);
$query = sprintf("SELECT * FROM tblprodotti AS p LEFT JOIN tblprodotticonsole AS pc ON p.codiceprodotto = pc.codiceprodotto");
$dati = eseguiQuery($connessione, $query);
$cartellaImmaginePrincipale = 'img';
foreach($dati as $riga){
	print '<div id="corpoCatalogo">'.'<div id="catcolsx"><img src="'.HOME_WEB.'/'.$cartellaImmaginePrincipale.'/thumb/'.$riga['immagine'].'"></img>'.'</div>'.
	'<div id="catcoldx"><p><b>Codice Prodotto: </b>'.$riga['codiceprodotto'].'</p>'.
	'<p><b>Nome Prodotto: </b>'.$riga['nomeprodotto'].'</p>'.
	'<p><b>Descrizione: </b>'.$riga['descrizione'].'</p>'.
	'<p><b>Prezzo: </b>'.$riga['prezzo'].' €</p>'.
	'<p><b>Quantita Disponibile: </b>'.$riga['numeropezzi'].'</p>'.
	'<p><b>Categoria: </b>'.$riga['categoria'].'</p>'.
	'<p><b>Console: </b>'.$riga['console'].'</p>';
	if(isset($_SESSION['collegato'])){
        print '<form id="' . $riga['codiceprodotto'] . '" method="post" action="../script/scriptInserimentoCarrello.php">';
        print'<p><img src="../'.$cartellaImmaginePrincipale.'/style/cart_add.png"></img></p>';
        print '<input type="hidden" name="codiceprodotto" value="' . $riga['codiceprodotto'] . '"/>';
        print '<p><b>Quantita di prodotto da inserire:</b>';
        print '<input type="text" name="quantita"></input></p>';
        print '<input type="submit" value="Inserisci Prodotto"></input>';
		print '</form>';
        print '<script type="text/javascript">';
        print "gestisciForm('#" . $riga['codiceprodotto'] . "','" . '../script/scriptInserimentoCarrello.php' . "','#coldx');";
        print '</script>';
    } else {
		print '<p class="informazione">Esegui il login per inserire il prodotto nel carrello</p>';
	}
	print '</div>'.'</div>';
}

chiudiConnessione($connessione);

include HOME_ROOT.'/html/coda.html';
?>
