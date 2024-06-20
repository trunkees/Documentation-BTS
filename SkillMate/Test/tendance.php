<?php 

include "../BDD/BDD.php";

$sql = "SELECT Projet.Nom, Projet.Description, Profil.Pseudo, Projet.DateCreation, Projet.Domaine FROM Projet
                INNER JOIN LikeProjet ON Projet.Projet_ID = LikeProjet.Projet_ID
                INNER JOIN Profil ON Projet.Createur = Profil.Pseudo
                GROUP BY Projet.Projet_ID
                ORDER BY COUNT(LikeProjet.Like_ID) DESC
                LIMIT 3";

$stmt = $bdd->prepare($sql);
$stmt->execute();
$resultTendance = $stmt;



    if ($resultTendance->rowCount() > 0) {
        while ($row = $resultTendance->fetch(PDO::FETCH_ASSOC)) {
            echo '<h4 class="mb-2">' . $row["Nom"] . '</h4>';
            echo '<p>' . $row["Description"] . '</p>';
            echo '<div class="d-flex align-items-center mt-4">';
            echo '<div class="avatar-group d-flex">';
            echo '<img src="images/no_pp.png" class="img-fluid avatar-image" alt="">';
            echo '<div class="ms-3">' . $row["Pseudo"] . '<p class="createur-text mb-0">Créateur</p></div></div>';
            echo '<span class="mx-3 mx-lg-5"><i class="bi-clock me-2"></i>' . $row["DateCreation"] . '</span>';
            echo '<span class="mx-1 mx-lg-5"><i class="bi-layout-sidebar me-2"></i>' . $row["Domaine"] . '</span></div>';
            echo '<a class="custom-btn custom-border-btn btn custom-link mt-3 me-3" href="#">Rejoindre</a>';
        }
    } else {
        echo '<p>Aucun projet trouvé.</p>';
    }


?>