<?php 


include('../../BDD/BDD.php');

class RepQuestionnaire 

{
    private $bdd;

    public function __construct($bdd)

    {
        $this->bdd = $bdd;
    }

    public function ajouterRepQuestionnaire($reponse, $DateSoumission, $Projet_ID, $Profile, $Profile_ID)
    {   
        $req = $this->bdd->prepare("INSERT INTO ReponseFormulaire(reponse, DateSoumission, Projet_ID, Profile, Profile_ID) VALUES (:reponse, :DateSoumission, :Projet_ID, :Profile, :Profile_ID)");
        $req->bindParam(':reponse',$reponse);
        $req->bindParam(':DateSoumission',$DateSoumission);
        $req->bindParam(':Projet_ID',$Projet_ID);
        $req->bindParam(':Profile',$Profile);
        $req->bindParam(':Profile_ID',$Profile_ID);
        return $req->execute();
    }

    public function allRepQuestionnaire()
    {
        $req = $this->bdd->prepare("SELECT * FROM ReponseFormulaire");
        $req->execute();
        return $req->fetchAll();
    }

    public function supprimerRepQuestionnaire($id)
    {
        $req = $this->bdd->prepare("DELETE FROM ReponseFormulaire WHERE ReponseID = ?");
        return $req->execute ([$id]);
    }

    public function updateRepQuestionnaire($reponse, $DateSoumission, $Projet_ID, $Profile, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE ReponseFormulaire SET reponse = :reponse, DateSoumission = :DateSoumission, Projet_ID = :Projet_ID, Profile = :Profile WHERE ReponseID = :id");
        $stmt->bindParam(':reponse', $reponse);
        $stmt->bindParam(':DateSoumission',$DateSoumission);
        $stmt->bindParam(':Projet_ID',$Projet_ID);
        $stmt->bindParam(':Profile',$Profile);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM ReponseFormulaire WHERE ReponseID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function ajouterDemandeProjet($projet_id, $profile_id, $role_demande="Membre")
    {
        $req = $this->bdd->prepare("INSERT INTO DemandesProjet(id_projet, profile_id, role_demande) VALUES (:projet_id, :profile_id, :role_demande)");
        $req->bindParam(':projet_id', $projet_id);
        $req->bindParam(':profile_id', $profile_id);
        $req->bindParam(':role_demande', $role_demande);
        $req->execute();
    }
    


}

?>