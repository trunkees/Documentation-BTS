<?php

// Connexion à la base de données
$db_username = 'skillmate';
$db_password = 'password';
$db_name = 'skillmate';
$db_host = 'localhost';
$bdd = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($bdd->connect_error) {
    die('Erreur de connexion à la base de données : ' . $bdd->connect_error);
}
include('../../model/LikeProjet/LikeProjetModel.php');

if (isset($_POST['action'])) {
    $likeProjet = new LikeProjetController($bdd);

    switch ($_POST['action']) {

        case 'ajouter':
            $projet_id = $_POST['Projet_ID'];
            $profile_id = $_POST['Profile_ID'];

            $sql = "SELECT * FROM LikeProjet WHERE Projet_ID = ? AND Profile_ID = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->bind_param('ii', $projet_id, $profile_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // L'utilisateur a déjà aimé le projet, supprimez le like existant
                $likeProjet->delete();
                echo "Like supprimé avec succès.";
            } else {
                // L'utilisateur peut aimer le projet
                $likeProjet->create();
            }

            break;

        case 'supprimer':
            $likeProjet->delete();
            echo "Like supprimé avec succès.";
            break;

        case 'update':
            $likeProjet->update();
            break;

        default:
            header('Location:../../index.php');
            break;
    }
}

class likeProjetController
{
    private $likeProjet;

    public function __construct($bdd)
    {
        $this->likeProjet = new LikeProjet($bdd);
    }

public function create()
{
    $projet_id = $_POST['Projet_ID'];
    $profile_id = $_POST['Profile_ID'];

    $this->likeProjet->ajouterLikeProjet($projet_id, $profile_id);
    header("Location: ../../View/projet/DetailProjet.php?id=$projet_id");
}

    public function delete()
    {
        $projet_id = $_POST['Projet_ID'];
        $profile_id = $_POST['Profile_ID'];

        $this->likeProjet->supprimerLikeProjet($projet_id, $profile_id);
        header("Location: ../../View/projet/DetailProjet.php?id=$projet_id");
    }

    public function update()
    {
        $this->likeProjet->updateLikeProjet($_POST['Projet_ID'], $_POST['Profile_ID'], $_POST['Like_ID']);
        header('Location:../../index.php');
    }
}
?>