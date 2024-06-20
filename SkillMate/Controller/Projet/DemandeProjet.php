<?php 

include ('../../BDD');
include('../../model/projet/DemandesProjetModel.php');

if (isset($_GET['action']) && isset($_GET['id_demande'])) {

    $action = $_GET['action'];
    $id_demande = $_GET['id_demande'];
    $demandeprojetModel = new DemandesProjetModel($bdd);

    switch ($action) {
        case 'accepter':
            $pseudo = $_GET['pseudo'];
            $demandeprojetModel->accepterDemande($id_demande,$pseudo,'Membre');
            header('Location:../../index.php');
            break;
        case 'refuser':
            $demandeprojetModel->refuserDemande($id_demande);
            header('Location:../../index.php');
            break;
        default:
            header('Location:../../index.php');
            break;
    }
}
else {
    echo "Action ou ID de la demande non spécifié";
}
?>