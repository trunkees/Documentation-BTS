<?php


class LikeProjet 
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function ajouterLikeProjet($Projet_ID, $Profile_ID)
    {
        $sql = "INSERT INTO LikeProjet(Projet_ID, Profile_ID) VALUES (?, ?)";
        $stmt = $this->bdd->prepare($sql);

        if (!$stmt) {
            die('Erreur de préparation de la requête : ' . $this->bdd->error);
        }

        $stmt->bind_param('ii', $Projet_ID, $Profile_ID);
        $result = $stmt->execute();

        if (!$result) {
            die('Erreur lors de l\'exécution de la requête : ' . $stmt->error);
        }

        return $result;
    }

    public function countLikesForProject($projet_id)
    {
        $sql = "SELECT COUNT(*) AS like_count FROM LikeProjet WHERE Projet_ID = ?";
        $stmt = $this->bdd->prepare($sql);

        if (!$stmt) {
            die('Erreur de préparation de la requête : ' . $this->bdd->error);
        }

        $stmt->bind_param('i', $projet_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $likeCount = $result->fetch_assoc()['like_count'];

        return $likeCount;
    }

    public function supprimerLikeProjet($projet_id, $profile_id)
    {
        $sql = "DELETE FROM LikeProjet WHERE Projet_ID = ? AND Profile_ID = ?";
        $stmt = $this->bdd->prepare($sql);

        if (!$stmt) {
            die('Erreur de préparation de la requête : ' . $this->bdd->error);
        }

        $stmt->bind_param('ii', $projet_id, $profile_id);
        $result = $stmt->execute();

        if (!$result) {
            die('Erreur lors de l\'exécution de la requête : ' . $stmt->error);
        }

        return $result;
    }

    public function verifierLike($projet_id, $profile_id)
    {
        $sql = "SELECT * FROM LikeProjet WHERE Projet_ID = ? AND Profile_ID = ?";
        $stmt = $this->bdd->prepare($sql);

        if (!$stmt) {
            die('Erreur de préparation de la requête : ' . $this->bdd->error);
        }

        $stmt->bind_param('ii', $projet_id, $profile_id);
        $stmt->execute();

        // Use fetch_assoc to get an associative array of the result
        $result = $stmt->get_result()->fetch_assoc();

        return !empty($result);
    }
}
?>