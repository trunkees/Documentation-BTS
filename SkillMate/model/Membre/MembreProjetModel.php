<?php 


include('../../BDD/BDD.php');

class membreprojet

{
    private $bdd;

    public function __construct($bdd)

    {
        $this->bdd = $bdd;
    }

    public function ajoutermembreprojet($Projet_ID, $Profile_ID, $Pseudo)


    { 
        $req = $this->bdd->prepare("INSERT INTO MembreProjet(Projet_ID, Profile_ID) VALUES (:Projet_ID, :Profile_ID)");
        $req->bindParam(':Projet_ID', $Projet_ID);
        $req->bindParam(':Profile_ID',$Profile_ID);
        $req->bindParam(':Pseudo',$Pseudo);
        return $req->execute();
    }

    public function allmembreprojet()
    {
        $req = $this->bdd->prepare("SELECT * FROM MembreProjet");
        $req->execute();
        return $req->fetchAll();
    }

public function supprimermembreprojet($id)
{
    $req = $this->bdd->prepare("DELETE FROM MembreProjet WHERE Pseudo = ?");
    $req->execute([$id]);

    $stmt = $this->bdd->prepare("UPDATE Profil SET Role = :role WHERE Pseudo = :pseudo");
    $role = 'UserSimple';  
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':pseudo', $id);
    $stmt->execute();

    return true; 
}

    public function updatemembreprojet($Projet_ID, $Profile_ID, $Pseudo, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE MembreProjet SET Projet_ID = :Projet_ID, Profile_ID = :Profile_ID, Pseudo = :Pseudo WHERE MembreProjet_ID = :id");
        $stmt->bindParam(':Projet_ID', $Projet_ID);
        $stmt->bindParam(':Profile_ID',$Profile_ID);
        $stmt->bindParam(':Pseudo',$Pseudo);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM MembreProjet WHERE MembreProjet_ID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateRole($pseudo, $role) {
    $stmt = $this->bdd->prepare("UPDATE Profil SET Role = :role WHERE Pseudo = :pseudo");
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':pseudo', $pseudo);
    return $stmt->execute();
}

}

?>