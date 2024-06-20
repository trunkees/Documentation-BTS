<?php
include('../../BDD/BDD.php');

	include('../../model/repQuestionnaire/repQuestionnaireModel.php');
	

	if (isset ($_POST['action'])) {
		$repQuestionnaireController = new repQuestionnaireController($bdd);
		$reponses = isset($_POST['reponse']) ? $_POST['reponse'] : array();


		switch ($_POST['action']) {
			
					case 'ajouter':
						$repQuestionnaireController->create();
						break;
					case 'supprimer':
						$repQuestionnaireController->delete();
						break;
					case 'update':
						$repQuestionnaireController->update();
						break;
					default:
						header('Location:../../index.php');
						break;
		}
	}
	

	class repQuestionnaireController {
		private $repQuestionnaire;

		public function __construct($bdd) {
			$this->repQuestionnaire = new repQuestionnaire($bdd);
		}


		public function create()
    	{
        if (isset($_POST['Projet_ID'])) {
            $reponse_arr = $_POST['reponse'];

            if (!empty($reponse_arr)) {
                foreach ($reponse_arr as $reponse) {
                    $this->repQuestionnaire->ajouterRepQuestionnaire($reponse, $_POST['DateSoumission'], $_POST['Projet_ID'], $_POST['Profile'], $_POST['Profile_ID']);
                    
                }
            }
        }
		$this->repQuestionnaire->ajouterDemandeProjet($_POST['Projet_ID'], $_POST['Profile_ID']);
        	header('Location:../../index.php');
    	}

		public function delete() {
			$this->repQuestionnaire->supprimerRepQuestionnaire($_POST['deleteRepQuestionnaire']);
			header('Location:../../index.php');
		}

		public function update() {
			$this->repQuestionnaire->updateRepQuestionnaire($_POST['reponse'], $_POST['DateSoumission'], $_POST['Projet_ID'], $_POST['Profile'], $_POST['ReponseID']);
			header('Location:../../index.php');
		}

	} 




?>
