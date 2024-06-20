<?php

	include('../../BDD/BDD.php');
	include('../../model/contact/contactModel.php');
	
$contact = new Contact($bdd);
$allContact = $contact->AllContact();

?>