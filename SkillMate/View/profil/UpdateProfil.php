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
        $NomLien = $profilData['NomLien'];
        $Localisation = $profilData['Localisation']; } ?>

    <title>SkillMate - Modifier Profil</title>
</head>
<body>
    <?php include '../commun/Navbar.php'; ?>

       
<div class="profil-container">
    <div class="profil-details">   
        <div class="DetailTitle"><h2 class="card-title-white">Modifiez votre Profil</h2></div>
        <div class="card-body-update">
            <form method="POST" action="../../Controller/Profil/profil.php">

                <input type="hidden" name="Profile_ID" value="<?php echo $Profile_ID; ?>">

            <div class="row">

                <label for="Nom">Nom:</label><br>
                <input type="text" name="Nom" value="<?php echo $profilData['Nom']; ?>"><br><br>

                <label for="Prenom">Prenom:</label><br>
                <input type="text" name="Prenom" value="<?php echo $profilData['Prenom']; ?>"><br><br>

                <label for="Email">Email:</label><br>
                <input type="text" name="Email" value="<?php echo $profilData['Email']; ?>"><br><br>

                <label for="Telephone">Telephone:</label><br>
                <input type="text" name="Telephone" value="<?php echo $profilData['Telephone']; ?>"><br><br>

                <label for="Datenaissance">Datenaissance:</label><br>
                <input type="text" name="Datenaissance" value="<?php echo $profilData['Datenaissance']; ?>"><br><br>

                <label for="Genre">Genre:</label><br>
                <select name="Genre">
                    <option value="Homme" <?php echo ($profilData['Genre'] === 'Homme') ? 'selected' : ''; ?>>Homme</option>
                    <option value="Femme" <?php echo ($profilData['Genre'] === 'Femme') ? 'selected' : ''; ?>>Femme</option>
                </select><br><br>

                <label for="Pseudo">Pseudo:</label><br>
                <input type="text" name="Pseudo" value="<?php echo $profilData['Pseudo']; ?>"><br><br>

                <label for="Password">Password:</label><br>
                <input type="password" name="Password" value="password"><br><br>

                <label for="Biographie">Biographie:</label><br>
                <textarea class="biotext" name="Bio" rows="5" cols="50" style="resize: none;"><?php echo $profilData['Bio']; ?></textarea><br><br>

                <label for="Lien">Lien:</label><br>
                <input type="url" name="Lien" value="<?php echo $profilData['Lien']; ?>"><br><br>

                <label for="NomLien">Nommez votre Lien:</label><br>
                <input type="text" name="NomLien" value="<?php echo $profilData['NomLien']; ?>"><br><br>

                <label for="Localisation">Localisation:</label><br>
                <input type="text" name="Localisation" value="<?php echo $profilData['Localisation']; ?>"><br><br><br><br>

                <input type="hidden" name="action" value="update">
                <input type="submit" class="custom-btn" value="Mettre à jour le profil">
            </form>
        <div class="placebtnsolo">
            <a class="btn btn-danger mt-3 btn-projet" href="DeleteProfil.php?id=<?php echo $Profile_ID; ?>">Supprimer le profil</a>
        </div>
        </div>
        </div>
    </div>
</div>

<?php include '../commun/Footer.php'; ?>

</body>
</html>

