<?php 


include('../../BDD/BDD.php');

class Signalement 

{
    private $bdd;

    public function __construct($bdd)

    {
        $this->bdd = $bdd;
    }

    public function ajouterSignalement($Pseudo, $Email, $Feedback, $Profile_ID)


    {
        $req = $this->bdd->prepare("INSERT INTO Signalement(Pseudo, Email, Feedback, Profile_ID) VALUES (:Pseudo, :Email, :Feedback, :Profile_ID)");
        $req->bindParam(':Pseudo', $Pseudo);
        $req->bindParam(':Email',$Email);
        $req->bindParam(':Feedback',$Feedback);
        $req->bindParam(':Profile_ID',$Profile_ID);
        return $req->execute();
    }

    public function allSignalement()
    {
        $req = $this->bdd->prepare("SELECT * FROM Signalement");
        $req->execute();
        return $req->fetchAll();
    }

    public function supprimerSignalement($id)
    {
        $req = $this->bdd->prepare("DELETE FROM Signalement WHERE SignalementID = ?");
        return $req->execute ([$id]);
    }

    public function updateSignalement($Pseudo, $Email, $Feedback, $Profile_ID, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE Signalement SET Pseudo = :Pseudo, Email = :Email, Feedback = :Feedback, Profile_ID = :Profile_ID WHERE SignalementID = :id");
        $stmt->bindParam(':Pseudo', $Pseudo);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Feedback', $Feedback);
        $stmt->bindParam(':Profile_ID', $Profile_ID);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM Signalement WHERE SignalementID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


}

?>