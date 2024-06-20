<?php 


include('../../BDD/BDD.php');

class Questionnaire 

{
    private $bdd;

    public function __construct($bdd)

    {
        $this->bdd = $bdd;
    }

    public function ajouterQuestionnaire($field_name, $DateCreation, $NumQuestion, $Projet_ID)


    {
        $req = $this->bdd->prepare("INSERT INTO Questionnaire(field_name, DateCreation, NumQuestion, Projet_ID) VALUES (:field_name, :DateCreation, :NumQuestion, :Projet_ID)");
        $req->bindParam(':field_name',$field_name);
        $req->bindParam(':DateCreation',$DateCreation);
        $req->bindParam(':NumQuestion',$NumQuestion);
        $req->bindParam(':Projet_ID',$Projet_ID);
        return $req->execute();
    }

    public function allQuestionnaire()
    {
        $req = $this->bdd->prepare("SELECT * FROM Questionnaire");
        $req->execute();
        return $req->fetchAll();
    }

    public function supprimerQuestionnaire($id)
    {
        $req = $this->bdd->prepare("DELETE FROM Questionnaire WHERE Projet_ID = ?");
        return $req->execute ([$id]);
    }

    public function updateQuestionnaire($field_name, $DateCreation, $NumQuestion, $Projet_ID, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE Questionnaire SET field_name = :field_name, DateCreation = :DateCreation, NumQuestion = :NumQuestion, Projet_ID = :Projet_ID WHERE QuestionnaireID = :id");
        $stmt->bindParam(':field_name', $field_name);
        $stmt->bindParam(':DateCreation',$DateCreation);
        $stmt->bindParam(':NumQuestion',$NumQuestion);
        $stmt->bindParam(':Projet_ID',$Projet_ID);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM Questionnaire WHERE QuestionnaireID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


}

?>