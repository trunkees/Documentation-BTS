<?php
include('../../BDD/BDD.php');

class DemandesProjetModel {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    
    public function accepterDemande($demande_id,$pseudo,$role) {
        $sql = "UPDATE DemandesProjet SET statut_demande = 'Acceptée' WHERE id_demande = ?";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$demande_id]);
        $this->insererMembreProjet($demande_id,$pseudo);
        $this->supprimerDemande($demande_id);
        $this->UpdateRole($pseudo,$role);

    }

    public function refuserDemande($demande_id) {
        $sql = "UPDATE DemandesProjet SET statut_demande = 'Refusée' WHERE id_demande = ?";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$demande_id]);
        $this->supprimerDemande($demande_id);
    }


    private function insererMembreProjet($demande_id,$pseudo) {

        $demande = $this->getDemandeById($demande_id);
        $sql = "INSERT INTO MembreProjet (Projet_ID, Profile_ID, Pseudo) VALUES (?, ?, ?)";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$demande['id_projet'], $demande['profile_id'],$pseudo]);
    }

    private function updateRole($pseudo,$role)
    {
        $stmt = $this->bdd->prepare("UPDATE Profil SET Role = :role WHERE Pseudo = :pseudo");
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':pseudo', $pseudo);
        return $stmt->execute();
    }

    private function getDemandeById($demande_id) {
        $sql = "SELECT * FROM DemandesProjet WHERE id_demande = ?";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$demande_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function supprimerDemande($id_demande)
    {
        $sql = "DELETE FROM DemandesProjet WHERE id_demande = ?";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$id_demande]);
    }
    
}
