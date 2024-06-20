<?php

	include('../../BDD/BDD.php');
	include('../../model/profil/ProfilModel.php');
	
$profil = new Profil($bdd);
$allProfil = $profil->AllProfil();

?>