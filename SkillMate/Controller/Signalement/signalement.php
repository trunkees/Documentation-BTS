<?php
	// Connexion à la base de données
	$db_username = 'root';
	$db_password = '';
	$db_name = 'skillmate';
	$db_host = 'localhost';
	$bdd = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Communication impossible avec la base de données ' . $db_name);

	include('../../model/signalement/signalementModel.php');
	

	if (isset ($_POST['action'])) {
		$signalementController = new signalementController($bdd);

		switch ($_POST['action']) {
			
					case 'ajouter':
						$signalementController->create();
						break;
					case 'supprimer':
						$signalementController->delete();
						break;
					case 'update':
						$signalementController->update();
						break;
					default:
						header('Location:../../index.php');
						break;
		}
	}
	

	class signalementController {
		private $signalement;

		public function __construct($bdd) {
			$this->signalement = new Signalement($bdd);
		}

		public function create() {
			$this->signalement->ajouterSignalement($_POST['Pseudo'], $_POST['Email'], $_POST['Feedback'], $_POST['Profile_ID']);
			
			header('Location:../../index.php');
		}

		public function delete() {
			$this->signalement->supprimerSignalement($_POST['deleteSignalement']);
			header('Location:../../index.php');
		}

		public function update() {
			$this->signalement->updateSignalement($_POST['Pseudo'], $_POST['Email'], $_POST['Feedback'], $_POST['Profile_ID'], $_POST['SignalementID']);
			header('Location:../../index.php');
		}
	} 




?>
