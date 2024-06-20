<?php
include('../../BDD/BDD.php');


// Inclusion des modèles
include('../../model/projet/projetModel.php');
include('../../model/profil/ProfilModel.php');

if (isset($_POST['action'])) {
    $projetController = new ProjetController($bdd);

    switch ($_POST['action']) {
        case 'ajouter':
            $projetController->create();
            break;
        case 'supprimer':
            $projetController->delete();
            break;
        case 'update':
            $projetController->update();
            break;
        case 'search':
            $projetController->search();
            break;
        default:
            break;
    }
}

class ProjetController {
    private $projet;
    private $profilModel;

    public function __construct($bdd) {
        $this->projet = new Projet($bdd);
        $this->profilModel = new Profil($bdd);
    }
    public function create() {
        $this->projet->ajouterProjet(
            $_POST['Nom'],
            $_POST['Createur'],
            $_POST['Description'],
            $_POST['DateCreation'],
            $_POST['Domaine'],
            $_POST['StatutProjet'],
            $_POST['Budget'],
            $_POST['Localite'],
            $_POST['Profile_ID']
        );
    
        $this->profilModel->updateRole($_POST['Createur'], 'Créateur');
        
        

        header('Location:../../View/projet/Projets.php');
    }

    public function delete() {
        $this->projet->supprimerProjet($_POST['deleteProjet']);
        header('Location:../../View/projet/CreateProjet.php');
    }


    public function update() {
        $this->projet->updateProjet(
            $_POST['Nom'],
            $_POST['Createur'],
            $_POST['Description'],
            $_POST['DateCreation'],
            $_POST['Domaine'],
            $_POST['StatutProjet'],
            $_POST['Budget'],
            $_POST['Localite'],
            $_POST['Projet_ID']
        );
        header('Location:../../View/projet/CreateProjet.php');
    }

    public function search() {

        $searchResults = $this->projet->searchProjets($_POST['searchProj']);
        
        
    }
	
}
?>
