<?php
    session_start();
	include('../../BDD/BDD.php');

    if (isset($_POST['Prenom'])) {
        $Prenom = $_POST['Prenom'];
        $Nom = $_POST['Nom'];
        $Email = $_POST['Email'];
        $Telephone = $_POST['Telephone'];
        $Genre = $_POST['Genre'];
        $Datenaissance = $_POST['Datenaissance'];
        $Bio = $_POST['Bio'];
        $Localisation = $_POST['Localisation'];
        $Pseudo = $_POST['Pseudo'];
        $Password = $_POST['Password'];
        $Profile_ID = $_GET['Profile_ID'];

        $stmtEmail = $bdd->prepare("SELECT * FROM Profil WHERE Email = ?");
        $stmtEmail->execute([$Email]);
        $resultEmail = $stmtEmail->fetch();

        $stmtPseudo = $bdd->prepare("SELECT * FROM Profil WHERE Pseudo = ?");
        $stmtPseudo->execute([$Pseudo]);
        $resultPseudo = $stmtPseudo->fetch();



        if (isset($_FILES['cv']) && $_FILES['cv']) {
            $cv_tmp_name = $_FILES['cv']['tmp_name'];
            $cv_name = basename($_FILES['cv']['name']);
            $cv_path = 'uploads/cv/' . $cv_name;
            move_uploaded_file($cv_tmp_name, $cv_path);
        }

        if (isset($_FILES['photo']) && $_FILES['photo']) {
            $photo_tmp_name = $_FILES['photo']['tmp_name'];
            $photo_name = basename($_FILES['photo']['name']);
            $photo_path = 'uploads/photos/' . $photo_name;
            move_uploaded_file($photo_tmp_name, $photo_path);
        }

        // Rediriger vers une page de succès
        header('Location: success.php');
        exit;



        if ($resultEmail) {
            // L'adresse email existe déjà
            echo "Cette adresse email est déjà utilisée.";

        } 
        elseif ($resultPseudo) {
            // Le pseudo existe déjà
            echo "Ce pseudo est déjà utilisé.";

        } 
        else {

            $sqlInsert = "INSERT INTO Profil (Prenom, Nom, Email, Telephone, Genre, Datenaissance, Bio, Localisation, Pseudo, Password, photo, cv) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmtInsert = $bdd->prepare($sqlInsert);

            
            $hashedPassword = hash('sha256', $Password);
            


            $stmtInsert->execute([$Prenom, $Nom, $Email, $Telephone, $Genre, $Datenaissance, $Bio, $Localisation, $Pseudo, $hashedPassword,$photo_path,$cv_path]);


            $newProfileID = $bdd->lastInsertId();

            $_SESSION['InfoUser'] = [
                'Prenom' => $Prenom,
                'Nom' => $Nom,
                'Email' => $Email,
                'Telephone' => $Telephone,
                'Genre' => $Genre,
                'Datenaissance' => $Datenaissance,
                'Bio' => $Bio,
                'Localisation' => $Localisation,
                'Pseudo' => $Pseudo,
                'Profile_ID' => $newProfileID
            ];

            $_SESSION['is_logged'] = true;
            echo($_SESSION['is_logged']);

            header("Location: ../../index.php");
            exit();
        }
    }
?>







