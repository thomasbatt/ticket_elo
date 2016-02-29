<?php
	$file = "public/tickets.json";
	$json = file_get_contents( $file );

	if ( $json !== FALSE){
		$tickets = json_decode( $json, true);
	}
	else{
		$error = "Impossible d'ouvrir le fichier";
	}

	require('views/tickets.phtml');
	// require('views/formulaire_tickets.phtml');

?>