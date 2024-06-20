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

    <title>SkillMate - Modifier Projet</title>
</head>
<body>
    <?php include '../commun/Navbar.php'; ?>

<div class="profil-container">
    <div class="profil-details">   
        <div class="DetailTitle"><h2 class="card-title-white">Modifier le Projet</h2></div>

        <div class="card-body-update">
        <form method="POST" action="../../Controller/Projet/projet.php">
            
            <input type="hidden" name="Projet_ID" value="<?php echo $Projet_ID; ?>">

            <div class="row">

            <label for="ProjetNom">Nom du projet:</label><br>
            <input type="text" name="Nom" value="<?php echo $ProjetNom ?>"><br><br>

            <label for="Description">Description:</label><br>
            <input type="text" name="Description" value="<?php echo $Description ?>"><br><br>

            <label for="Createur">Createur:</label><br>
            <input type="text" name="Createur" value="<?php echo $Createur ?>"><br><br>

            <label for="DateCreation">Date de Creation:</label><br>
            <input type="text" name="DateCreation" value="<?php echo $DateCreation ?>"><br><br>

            <label for="Domaine">Domaine:</label><br>
            <input type="text" name="Domaine" value="<?php echo $Domaine ?>"><br><br>

            <label for="Budget">Budget:</label><br>
            <input type="text" name="Budget" value="<?php echo $Budget ?>"><br><br>

            <label for="Localite">Localite:</label><br>
            <input type="text" name="Localite" value="<?php echo $Localite ?>"><br><br>

            <label for="StatutProjet">Statut du Projet:</label><br>
            <select name="StatutProjet">
                <option value="0" <?php echo ($StatutProjet === '0') ? 'selected' : ''; ?>>En cours</option>
                <option value="1" <?php echo ($StatutProjet === '1') ? 'selected' : ''; ?>>Terminé</option>
            </select>
            <br><br><br><br>

            <input type="hidden" name="action" value="update">
            <input type="submit" class="custom-btn" value="Mettre à jour le projet">
            </div>
        </form>
        <div class="placebtnsolo">
            <a class="btn btn-danger mt-3 btn-projet" href="DeleteProjet.php?id=<?php echo $Projet_ID; ?>">Supprimer le projet</a>
        </div>
    </div>
</div></div>
<?php include '../commun/Footer.php'; ?>

</body>
</html>

