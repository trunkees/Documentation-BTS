<?php include '../commun/Header.php'; 
      include '../../BDD/BDD.php';

if (isset($_GET['id'])) {
    $Profile_ID = $_GET['id'];
} else {
    // Gérer le cas où l'ID n'est pas fourni dans l'URL
    echo "ID du profil non spécifié";
    exit;
}

$sql = "SELECT * FROM Profil WHERE Profile_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$Profile_ID]);

if ($profilData = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $Nom = $profilData['Nom'];
    $Prenom = $profilData['Prenom'];
    $Email = $profilData['Email'];
    $Telephone = $profilData['Telephone'];
    $Datenaissance = $profilData['Datenaissance'];
    $Genre = $profilData['Genre'];
    $Pseudo = $profilData['Pseudo'];
    $Bio = $profilData['Bio'];
    $Lien = $profilData['Lien'];
    $Localisation = $profilData['Localisation'];
}
?>

<title>SkillMate - Supprimer Profil</title>
</head>
<body>
    <?php include '../commun/Navbar.php'; ?>


<div class="profil-container">
    <div class="profil-details">   
        <div class="DetailTitle"><h2 class="card-title-white">Supprimer votre Profil <?php echo $Pseudo; ?> ?</h2></div>

        <div class="placebtnsolo">
            <form method="POST" action="../../Controller/Profil/profil.php">

                <!-- Bouton pour supprimer le profil -->
                <input type="hidden" name="deleteProfil" value="<?php echo $Profile_ID; ?>">
                <input type="hidden" name="action" value="supprimer">
                <input type="submit" class="btn btn-danger mt-3 btn-projet" value="Supprimer le profil">
            </form>
        </div>
    </div>
</div>

    <?php include '../commun/Footer.php'; ?>

</body>
</html>