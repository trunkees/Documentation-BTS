<?php

	include('../../BDD/BDD.php');
	include('../../model/questionnaire/questionnaireModel.php');
	
$questionnaire = new Questionnaire($bdd);
$allQuestionnaire = $questionnaire->AllQuestionnaire();

?>