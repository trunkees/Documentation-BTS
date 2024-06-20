<?php
	include('../../BDD/BDD.php');
	include('../../model/tache/tacheModel.php');
	
	if (isset ($_POST['action'])) {
		$tacheController = new tacheController($bdd);

		switch ($_POST['action']) {
			
					case 'ajouter':
						$tacheController->create();
						break;
					case 'supprimer':
						$tacheController->delete();
						break;
					case 'update':
						$tacheController->update();
						break;
					case 'affecter':
						$tacheController->affecter();
						break;
					default:
						header('Location:../../index.php');
						break;
		}
	}
	

	class tacheController {
		private $tache;

		public function __construct($bdd) {
			$this->tache = new Tache($bdd);
		}

		public function create() {
			$this->tache->ajouterTache($_POST['intitule'], $_POST['description'], $_POST['secteur'], $_POST['dateCreation'], $_POST['dateDebut'], $_POST['dateFin'], $_POST['statut_tache'], $_POST['classification'], $_POST['projet_id'] );
			
			header('Location:../../index.php');
		}

		public function delete() {
			$this->tache->supprimerTache($_POST['deleteSignalement']);
			header('Location:../../index.php');
		}

		public function update() {
			$this->tache->updateTache($_POST['intitule'], $_POST['description'], $_POST['secteur'], $_POST['dateCreation'], $_POST['dateDebut'], $_POST['dateFin'], $_POST['statut_tache']);
			header('Location:../../index.php');
		}

		public function affecter()
    	{
			$this->tache->affecterTache($_POST['profile_id'], $_POST['tache_id'], $_POST['dateAffectation'], $_POST['pseudo'], $_POST['projet_id'] );
			header('Location:../../index.php');
    	}

	} 





?>
