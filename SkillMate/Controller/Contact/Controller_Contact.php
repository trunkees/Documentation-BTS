<?php
	// Connexion à la base de données
	include('../../BDD/BDD.php');

	include('../../model/contact/contactModel.php');
	

	if (isset ($_POST['action'])) {
		$contactController = new contactController($bdd);

		switch ($_POST['action']) {
			
					case 'ajouter':
						$contactController->create();
						break;
					case 'supprimer':
						$contactController->delete();
						break;
					case 'update':
						$contactController->update();
						break;
					default:
						header('Location:../../index.php');
						break;
		}
	}
	

	class contactController {
		private $contact;

		public function __construct($bdd) {
			$this->contact = new Contact($bdd);
		}

		public function create() {
			$this->contact->ajouterContact($_POST['Nom'], $_POST['Sujet'], $_POST['Email'], $_POST['Message']);
			
			header('Location:../../index.php');
		}

		public function delete() {
			$this->contact->supprimerContact($_POST['deleteContact']);
			header('Location:../../index.php');
		}

		public function update() {
			$this->contact->updateContact($_POST['Nom'], $_POST['Sujet'], $_POST['Email'], $_POST['Message'], $_POST['ContactID']);
			header('Location:../../index.php');
		}
	} 
?>
