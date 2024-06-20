<?php 


include('../../BDD/BDD.php');

class Tache 

{
    private $bdd;

    public function __construct($bdd)

    {
        $this->bdd = $bdd;
    }

    public function ajouterTache($intitule, $description, $secteur, $dateCreation, $dateDebut, $dateFin, $statut_tache, $classification, $projet_id)


    {
        $req = $this->bdd->prepare("INSERT INTO Tache (Intitule, Description, Secteur, DateCreation, DateDebut, DateFin, Statut, Classification, Projet_ID) VALUES (:intitule, :description, :secteur, :dateCreation, :dateDebut, :dateFin, :statut_tache, :classification, :projet_id)");
        $req->bindParam(':intitule', $intitule);
        $req->bindParam(':description', $description);
        $req->bindParam(':secteur', $secteur);
        $req->bindParam(':dateCreation', $dateCreation);
        $req->bindParam(':dateDebut', $dateDebut);
        $req->bindParam(':dateFin', $dateFin);
        $req->bindParam(':statut_tache', $statut_tache);
        $req->bindParam(':classification', $classification);
        $req->bindParam(':projet_id', $projet_id);
        return $req->execute();
    }

    public function allTache()
    {
        $req = $this->bdd->prepare("SELECT * FROM Tache");
        $req->execute();
        return $req->fetchAll();
    }

    public function supprimerTache($id)
    {
        $req = $this->bdd->prepare("DELETE FROM Tache WHERE TacheID = ?");
        return $req->execute ([$id]);
    }

    public function updateTache($Pseudo, $Email, $Feedback, $Profile_ID, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE Tache SET Pseudo = :Pseudo, Email = :Email, Feedback = :Feedback, Profile_ID = :Profile_ID WHERE SignalementID = :id");
        $stmt->bindParam(':Pseudo', $Pseudo);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Feedback', $Feedback);
        $stmt->bindParam(':Profile_ID', $Profile_ID);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM Tache WHERE TacheID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function affecterTache($profile_id, $tache_id, $dateAffectation, $pseudo, $projet_id)
    {
        $req = $this->bdd->prepare("INSERT INTO AffectationTache (Profile_ID, TacheID, DateAffectation, Pseudo, Projet_ID) VALUES (:profile_id, :tache_id, :dateAffectation, :pseudo, :projet_id)");
        $req->bindParam(':profile_id', $profile_id);
        $req->bindParam(':tache_id', $tache_id);
        $req->bindParam(':dateAffectation', $dateAffectation);
        $req->bindParam(':pseudo', $pseudo);
        $req->bindParam(':projet_id', $projet_id);
        return $req->execute();
    }


}

?>