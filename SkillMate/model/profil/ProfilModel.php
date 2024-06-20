<?php 


include('../../BDD/BDD.php');

class Profil 

{
    private $bdd;

    public function __construct($bdd)

    {
        $this->bdd = $bdd;
    }

    public function ajouterProfil($Nom, $Prenom, $Email, $Telephone, $Datenaissance, $Genre, $Pseudo, $Bio, $Lien, $NomLien, $Password, $Localisation)


    {
        $req = $this->bdd->prepare("INSERT INTO Profil(Nom, Prenom, Email, Telephone, Datenaissance, Genre, Pseudo, Bio, Lien, Localisation) VALUES (:Nom, :Prenom, :Email, :Telephone, :Datenaissance, :Genre, :Pseudo, :Bio, :Lien, :Localisation)");
        $req->bindParam(':Nom', $Nom);
        $req->bindParam(':Prenom',$Prenom);
        $req->bindParam(':Email',$Email);
        $req->bindParam(':Telephone',$Telephone);
        $req->bindParam(':Datenaissance',$Datenaissance);
        $req->bindParam(':Genre',$Genre);
        $req->bindParam(':Pseudo',$Pseudo);
        $req->bindParam(':Bio',$Bio);
        $req->bindParam(':Lien',$Lien);
        $req->bindParam(':NomLien',$NomLien);
        $req->bindParam(':Localisation',$Localisation);
        return $req->execute();
    }

    public function allProfil()
    {
        $req = $this->bdd->prepare("SELECT * FROM Profil");
        $req->execute();
        return $req->fetchAll();
    }

    public function supprimerProfil($id)
    {
        $req = $this->bdd->prepare("DELETE FROM Profil WHERE Profile_ID = ?");
        return $req->execute ([$id]);
    }

    public function updateProfil($Nom, $Prenom, $Email, $Telephone, $Datenaissance, $Genre, $Pseudo, $Bio, $Lien, $NomLien, $Password, $Localisation, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE Profil SET Nom = :Nom, Prenom = :Prenom, Email = :Email, Telephone = :Telephone, Datenaissance = :Datenaissance, Genre = :Genre, Pseudo = :Pseudo, Bio = :Bio, Lien = :Lien, NomLien = :NomLien, Localisation = :Localisation WHERE Profile_ID = :id");
        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Prenom',$Prenom);
        $stmt->bindParam(':Email',$Email);
        $stmt->bindParam(':Telephone',$Telephone);
        $stmt->bindParam(':Datenaissance',$Datenaissance);
        $stmt->bindParam(':Genre',$Genre);
        $stmt->bindParam(':Pseudo',$Pseudo);
        $stmt->bindParam(':Bio',$Bio);
        $stmt->bindParam(':Lien',$Lien);
        $stmt->bindParam(':NomLien',$NomLien);
        $stmt->bindParam(':Localisation',$Localisation);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM Profil WHERE Profile_ID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function supprimerLikesProjet($Profile_id) {
    $query = "DELETE FROM LikeProjet WHERE Profile_ID = :Profile_id";
    $stmt = $this->bdd->prepare($query);
    $stmt->bindParam(':Profile_id', $Profile_id, PDO::PARAM_INT);
    $stmt->execute();
    }

    public function supprimerSignalements($Profile_id) {
    $query = "DELETE FROM Signalement WHERE Profile_ID = :Profile_id";
    $stmt = $this->bdd->prepare($query);
    $stmt->bindParam(':Profile_id', $Profile_id, PDO::PARAM_INT);
    $stmt->execute();
    }

    public function updateRole($pseudo, $role)
    {
        $stmt = $this->bdd->prepare("UPDATE Profil SET Role = :role WHERE Pseudo = :pseudo");
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':pseudo', $pseudo);
        return $stmt->execute();
    }

}

?>