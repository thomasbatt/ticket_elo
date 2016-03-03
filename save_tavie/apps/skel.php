<?php


if ( !empty($_SESSION) )
{
    $session_id = $_SESSION['id'];
    $user_id = $session_id;
    
	if ( $_SESSION['role'] == 'admin')
		$session_role = 'admin';
	else
		$session_role = 'user';
}
else{
	$session_id = null;
    $session_role = null;
}

$lt=setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

function week2str($annee, $no_semaine){
    // Récup jour début et fin de la semaine
    $timeStart = strtotime("First Monday January {$annee} + ".($no_semaine - 1)." Week");
    $timeEnd   = strtotime("First Monday January {$annee} + {$no_semaine} Week -1 day");
     
    // Récup année et mois début
    $anneeStart = date("Y", $timeStart);
    $anneeEnd   = date("Y", $timeEnd);
    $moisStart  = date("m", $timeStart);
    $moisEnd    = date("m", $timeEnd);
     
    // Gestion des différents cas de figure
    if( $anneeStart != $anneeEnd ){
        // à cheval entre 2 années
        $retour = "du ".strftime("%d %B %Y", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
    } elseif( $moisStart != $moisEnd ){
        // à cheval entre 2 mois
        $retour = "du ".strftime("%d %B", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
    } else {
        // même mois
        $retour = "du ".strftime("%d", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
    }
    return $retour;
}

// var_dump('coucou');
// var_dump($session_role);

require('views/skel.phtml');
?>