<?php

include('../../BDD/BDD.php');

class Projet 
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function ajouterProjet($Nom, $Createur, $Description, $DateCreation, $Domaine, $StatutProjet, $Budget, $Localite, $Profile_ID)
    {
        $req = $this->bdd->prepare("INSERT INTO Projet(Nom, Createur, Description, DateCreation, Domaine, StatutProjet, Budget, Localite) VALUES (:Nom, :Createur, :Description, :DateCreation, :Domaine, :StatutProjet, :Budget, :Localite)");
        $req->bindParam(':Nom', $Nom);
        $req->bindParam(':Createur', $Createur);
        $req->bindParam(':Description', $Description);
        $req->bindParam(':DateCreation', $DateCreation);
        $req->bindParam(':Domaine', $Domaine);
        $req->bindParam(':StatutProjet', $StatutProjet);
        $req->bindParam(':Budget', $Budget);
        $req->bindParam(':Localite', $Localite);
        $result = $req->execute();

        $projetID = $this->bdd->lastInsertId();

        $sql = "INSERT INTO MembreProjet (Projet_ID, Profile_ID, Pseudo) VALUES (?, ?, ?)";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$projetID, $Profile_ID, $Createur]);

        $role = $this->getRoleByPseudo($Createur);
        if (!$role) {
            
            $this->updateRole($Createur, 'Créateur');
        }
        return $result;
    }

    public function allProjet($orderAsc=true)
    {
        $req = $this->bdd->prepare("SELECT * FROM Projet ORDER BY `Projet`.`DateCreation` ". ($orderAsc ? "Asc" : "Desc"));
        $req->execute();
        return $req->fetchAll();
    }

    public function allProjetClasser()
    {
        $req = $this->bdd->prepare("SELECT * FROM `Projet` ORDER BY `Projet`.`DateCreation` ASC ");
        $req->execute();
        return $req->fetchAll();
    }
    public function supprimerProjet($id)
    {
        $req = $this->bdd->prepare("DELETE FROM Projet WHERE Projet_ID = ?");
        return $req->execute([$id]);
    }

    public function updateProjet($Nom, $Createur, $Description, $DateCreation, $Domaine, $StatutProjet, $Budget, $Localite, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE Projet SET Nom = :Nom, Createur = :Createur, Description = :Description, DateCreation = :DateCreation, Domaine = :Domaine, StatutProjet = :StatutProjet, Budget = :Budget, Localite = :Localite WHERE Projet_ID = :id");
        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Createur', $Createur);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':DateCreation', $DateCreation);
        $stmt->bindParam(':Domaine', $Domaine);
        $stmt->bindParam(':StatutProjet', $StatutProjet);
        $stmt->bindParam(':Budget', $Budget);
        $stmt->bindParam(':Localite', $Localite);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM Projet WHERE Projet_ID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    private function getRoleByPseudo($pseudo)
    {
        $stmt = $this->bdd->prepare('SELECT Role FROM Profil WHERE Pseudo = ?');
        $stmt->execute([$pseudo]);
        $result = $stmt->fetch();

        if ($result) {
            return $result['Role'];
        }

        return false;
    }

    private function updateRole($pseudo, $role)
    {
        $stmt = $this->bdd->prepare("UPDATE Profil SET Role = :role WHERE Pseudo = :pseudo");
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':pseudo', $pseudo);
        return $stmt->execute();
    }

    private function insertMembreProjet($projetID, $profileID, $pseudo)
    {
    $sql = "INSERT INTO MembreProjet (Projet_ID, Profile_ID, Pseudo) VALUES (?, ?, ?)";
    $stmt = $this->bdd->prepare($sql);
    $stmt->execute([$projetID, $profileID, $pseudo]);
    }

    public function searchProjets($searchproj) {
        $searchproj = "%{$searchproj}%";
        $query = "SELECT * FROM Projet WHERE Nom LIKE :searchproj OR Createur LIKE :searchproj OR Description LIKE :searchproj OR Domaine LIKE :searchproj OR Localite LIKE :searchproj";
        
        $stmt = $this->bdd->prepare($query);
        $stmt->bindParam(':searchproj', $searchproj, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>
