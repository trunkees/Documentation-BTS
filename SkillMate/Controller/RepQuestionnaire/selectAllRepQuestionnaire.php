<?php

	include('../../BDD/BDD.php');
	include('../../model/repQuestionnaire/repQuestionnaireModel.php');
	
$repQuestionnaire = new RepQuestionnaire($bdd);
$allRepQuestionnaire = $repQuestionnaire->AllRepQuestionnaire();

?>