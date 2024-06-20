<?php
	include('../../BDD/BDD.php');

	include('../../model/Membre/MembreProjetModel.php');
	

	if (isset ($_POST['action'])) {
		$membreprojetController = new membreprojetController($bdd);

		switch ($_POST['action']) {
			
					case 'ajouter':
						$membreprojetController->create();
						break;
					case 'supprimer':
						$membreprojetController->delete();
						break;
					case 'update':
						$membreprojetController->update();
						break;
					case 'promouvoir':
			            $membreprojetController->promouvoir();
			            break;
			        case 'releguer':
			        	$membreprojetController->releguer();
			        	break;
					default:
						header('Location:../../index.php');
						break;
		}
	}
	

	class membreprojetController {
		private $membreprojet;

		public function __construct($bdd) {
			$this->membreprojet = new membreprojet($bdd);
		}

		public function create() {
			$this->membreprojet->ajoutermembreprojet($_POST['Profile_ID'], $_POST['Projet_ID'],$_POST['Pseudo']);
			
			header('Location:../../index.php');
		}

		public function delete() {
			$this->membreprojet->supprimermembreprojet($_POST['deletemembreprojet']);
			header('Location:../../index.php');
		}

		public function update() {
			$this->membreprojet->updatemembreprojet($_POST['Profile_ID'], $_POST['Projet_ID'],$_POST['Pseudo'], $_POST['MembreProjet_ID']);
			header('Location:../../index.php');
		}

		public function promouvoir() {
		    $pseudo = $_POST['promouvoir'];
		    $role = 'ChefEquipe';  // Nouveau rôle
		    $this->membreprojet->updateRole($pseudo, $role);
		    header('Location:../../index.php');
		}

		public function releguer() {
		    $pseudo = $_POST['releguer'];
		    $role = 'Membre';  
		    $this->membreprojet->updateRole($pseudo, $role);
		    header('Location:../../index.php');
		}
	} 


?>
