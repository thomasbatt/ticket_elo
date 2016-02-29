<?php
	if( $tickets[$count]['etat'] == 'afaire')
		require ('views/lien_afaire.phtml');
	if( $tickets[$count]['etat'] == 'encours')
		require ('views/lien_encours.phtml');
	if( $tickets[$count]['etat'] == 'fait')
		require ('views/lien_fait.phtml');
?>