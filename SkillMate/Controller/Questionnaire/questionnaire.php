<?php
	include('../../BDD/BDD.php');

	include('../../model/questionnaire/questionnaireModel.php');
	

	if (isset ($_POST['action'])) {
		$questionnaireController = new questionnaireController($bdd);
		$fieldNames = isset($_POST['field_name']) ? $_POST['field_name'] : array();


		switch ($_POST['action']) {
			
					case 'ajouter':
						$questionnaireController->create();
						break;
					case 'supprimer':
						$questionnaireController->delete();
						break;
					case 'update':
						$questionnaireController->update();
						break;
					default:
						header('Location:../../index.php');
						break;
		}
	}
	

	class questionnaireController {
		private $questionnaire;

		public function __construct($bdd) {
			$this->questionnaire = new Questionnaire($bdd);
		}

		public function create() {

			if(isset($_POST['Projet_ID'])) {
				$fieldname_arr = $_POST['field_name'];

			if(!empty($fieldname_arr)){
				for ($i=0; $i < count($fieldname_arr); $i++) { 
					$fieldname = $fieldname_arr[$i]; 
					var_dump($fieldname);

					$NumQuestion = $i;

					$this->questionnaire->ajouterQuestionnaire($fieldname, $_POST['DateCreation'], $NumQuestion, $_POST['Projet_ID']);
					header('Location:../../index.php');
				}
			}
		}  

			

		}

		public function delete() {
			$this->questionnaire->supprimerQuestionnaire($_POST['deleteQuestionnaire']);
			header('Location:../../index.php');
		}

		public function update() {

			if(isset($_POST['DateCreation'])) {
				$fieldname_arr = $_POST['field_name'];

			if(!empty($fieldname_arr)){
				for ($i=0; $i < count($fieldname_arr); $i++) { 
					$fieldname = $fieldname_arr[$i]; 
					var_dump($fieldname);

					$NumQuestion = $i;

			$this->questionnaire->updateQuestionnaire($fieldname, $_POST['DateCreation'], $NumQuestion, $_POST['Projet_ID'], $_POST['QuestionnaireID']);
			header('Location:../../index.php');
		}
	} 
}
}
}



?>
