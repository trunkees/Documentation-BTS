<?php 


include('../../BDD/BDD.php');

class Contact

{
    private $bdd;

    public function __construct($bdd)

    {
        $this->bdd = $bdd;
    }

    public function ajouterContact($Nom, $Sujet, $Email, $Message)


    {
        $req = $this->bdd->prepare("INSERT INTO Contact(Nom, Sujet, Email, Message) VALUES (:Nom, :Sujet, :Email, :Message)");
        $req->bindParam(':Nom', $Nom);
        $req->bindParam(':Sujet',$Sujet);
        $req->bindParam(':Email',$Email);
        $req->bindParam(':Message',$Message);
        return $req->execute();
    }

    public function allContact()
    {
        $req = $this->bdd->prepare("SELECT * FROM Contact");
        $req->execute();
        return $req->fetchAll();
    }

    public function supprimerContact($id)
    {
        $req = $this->bdd->prepare("DELETE FROM Contact WHERE ContactID = ?");
        return $req->execute ([$id]);
    }

    public function updateContact($Nom, $Sujet, $Email, $Message, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE Contact SET Nom = :Nom, Sujet = :Sujet, Email = :Email, Message = :Message WHERE ContactID = :id");
        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Sujet', $Sujet);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Message', $Message);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM Contact WHERE ContactID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


}

?>