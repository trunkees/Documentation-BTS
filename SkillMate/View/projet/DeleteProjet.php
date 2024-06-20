<?php include '../commun/Header.php'; 
      include '../../BDD/BDD.php';


    if (isset($_GET['id'])) {
        $Projet_ID = $_GET['id'];

    } else {
        // Gérer le cas où l'ID n'est pas fourni dans l'URL
        echo "ID du projet non spécifié";
        exit;
    }

        $sql = "SELECT * FROM Projet WHERE Projet_ID = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$Projet_ID]);

        if ($projetData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
        $ProjetNom = $projetData['Nom'];
        $Description = $projetData['Description'];
        $Createur = $projetData['Createur'];
        $DateCreation = $projetData['DateCreation'];
        $Domaine = $projetData['Domaine'];
        $Budget = $projetData['Budget'];
        $Localite = $projetData['Localite'];
        $StatutProjet = $projetData['StatutProjet']; } ?>

        <title>SkillMate - <?php echo "$ProjetNom"; ?></title>
    </head>
<body>
    <?php include '../commun/Navbar.php'; ?>

<div class="profil-container">
    <div class="profil-details">   
        <div class="DetailTitle"><h2 class="card-title-white">Supprimer le Projet <?php echo $ProjetNom; ?> ?</h2></div>

        <div class="placebtnsolo">
            <form method="POST" action="../../Controller/Projet/projet.php">

                <!-- Bouton pour supprimer le profil -->
                <input type="hidden" name="deleteProjet" value="<?php echo $Projet_ID; ?>">
                <input type="hidden" name="action" value="supprimer">
                <input type="submit" class="btn btn-danger mt-3 btn-projet" value="Supprimer le projet">
            </form>
        </div>
    </div>
</div>
    

    <?php include '../commun/Footer.php'; ?>

</body>
</html>
