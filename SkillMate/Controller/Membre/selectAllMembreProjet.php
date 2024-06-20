<?php

	include('../../BDD/BDD.php');
	include('../../model/MembreProjet/MembreProjetModel.php');
	
$membreprojet = new membreprojet($bdd);
$allmembreprojet = $membreprojet->Allmembreprojet();

?>