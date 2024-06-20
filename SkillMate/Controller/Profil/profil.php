<?php
	include('../../BDD/BDD.php');

	include('../../model/profil/ProfilModel.php');
	

	if (isset ($_POST['action'])) {
		$profilController = new profilController($bdd);

		switch ($_POST['action']) {
			
					case 'ajouter':
						$profilController->create();
						break;
					case 'supprimer':
						$profilController->delete();
						break;
					case 'update':
						$profilController->update();
						break;
					default:
						header('Location:../../index.php');
						break;
		}
	}
	

	class profilController {
		private $profil;

		public function __construct($bdd) {
			$this->profil = new Profil($bdd);
		}

		public function create() {
			$this->profil->ajouterProfil($_POST['Nom'], $_POST['Prenom'], $_POST['Email'], $_POST['Telephone'], $_POST['Datenaissance'], $_POST['Genre'], $_POST['Pseudo'], $_POST['Bio'], $_POST['Lien'],$_POST['NomLien'], $_POST['Password'], $_POST['Localisation']);
			
			header('Location:../../index.php');
		}

		public function delete() {
			 $Profile_id = $_POST['deleteProfil'];

			$this->profil->supprimerSignalements($Profile_id);
			$this->profil->supprimerLikesProjet($Profile_id);
			$this->profil->supprimerProfil($_POST['deleteProfil']);
			session_start();
			session_destroy();
			header('Location:../../index.php');
		}

		public function update() {
			$this->profil->updateProfil($_POST['Nom'], $_POST['Prenom'], $_POST['Email'], $_POST['Telephone'], $_POST['Datenaissance'], $_POST['Genre'], $_POST['Pseudo'], $_POST['Bio'], $_POST['Lien'], $_POST['NomLien'], $_POST['Password'], $_POST['Localisation'], $_POST['Profile_ID']);
			header('Location:../../index.php');
		}
	} 




?>
