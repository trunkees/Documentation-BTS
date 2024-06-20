<?php

	include('../../BDD/BDD.php');
	include('../../model/projet/projetModel.php');
	
$projet = new Projet($bdd);
$allProjet = $projet->AllProjet();

?>