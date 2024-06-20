<?php
session_start();

// Connexion à la base de données
$db_username = 'skillmate';
$db_password = 'password';
$db_name = 'skillmate';
$db_host = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Communication impossible avec la base de données ' . $db_name);

if (isset($_POST['Pseudo']) && isset($_POST['Password'])) {
    $pseudo = mysqli_real_escape_string($db, htmlspecialchars($_POST['Pseudo']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['Password']));

    if ($pseudo !== "" && $password !== "") {
        $requete = "SELECT * FROM Profil WHERE Pseudo = '$pseudo'";
        $exec_requete = mysqli_query($db, $requete);

        if ($exec_requete) {
            $templine = mysqli_fetch_assoc($exec_requete);
            if ($templine) {

                $hashed_password = hash('sha256', $password);

                if ($hashed_password === $templine['Password']) {
                    $_SESSION['InfoUser'] = [
                        'Prenom' => $templine['Prenom'],
                        'Nom' => $templine['Nom'],
                        'Email' => $templine['Email'],
                        'Telephone' => $templine['Telephone'],
                        'Genre' => $templine['Genre'],
                        'Datenaissance' => $templine['Datenaissance'],
                        'Bio' => $templine['Bio'],
                        'Localisation' => $templine['Localisation'],
                        'Pseudo' => $templine['Pseudo'],
                        'Profile_ID' => $templine['Profile_ID'],
                    ];

                    $count = mysqli_num_rows($exec_requete);

                    if ($count != 0) { // nom d'utilisateur et mot de passe corrects 
                        $_SESSION['is_logged'] = true;
                        echo($_SESSION['is_logged']);
                        header('Location: ../../index.php');
                    } else {
                        echo "Mot de passe incorrect";
                    }
                } else {
                    echo "Pseudo incorrect";
                }
            } else {
                echo "Pseudo incorrect";
            }
        } else {
            // La requête a échoué, afficher l'erreur
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($db);
        }
    }
}
?>
