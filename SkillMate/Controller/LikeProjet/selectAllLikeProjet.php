<?php

	include('../../BDD/BDD.php');
	include('../../model/LikeProjet/LikeProjetModel.php');
	
$likeProjet = new LikeProjet($bdd);
$allLikeProjet = $likeprojet->AllLikeProjet();

?>