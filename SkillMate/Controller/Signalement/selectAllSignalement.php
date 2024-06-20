<?php

	include('../../BDD/BDD.php');
	include('../../model/signalement/signalementModel.php');
	
$signalement = new Signalement($bdd);
$allSignalement = $signalement->AllSignalement();

?>