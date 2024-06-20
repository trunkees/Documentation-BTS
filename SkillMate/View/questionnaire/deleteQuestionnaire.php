<?php include '../commun/Header.php'; 
      include '../../BDD/BDD.php';


    if (isset($_GET['id'])) {
        $Projet_ID = $_GET['id'];

    } else {
        // Gérer le cas où l'ID n'est pas fourni dans l'URL
        echo "ID du projet non spécifié";
        exit;
    }

        $sql = "SELECT * FROM Questionnaire WHERE Projet_ID = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$Projet_ID]);

        ?>

        <title>SkillMate - Supprimer questionnaire</title>
    </head>
<body>
    <?php include '../commun/Navbar.php'; ?>

    

<div class="profil-container">
    <div class="profil-details">   
        <div class="DetailTitle"><h2 class="card-title-white">Supprimer le questionnaire ?</h2></div>

        <div class="placebtnsolo">
            <form method="POST" action="../../Controller/Questionnaire/questionnaire.php">

                <!-- Bouton pour supprimer le profil -->
                <input type="hidden" name="deleteQuestionnaire" value="<?php echo $Projet_ID; ?>">
                <input type="hidden" name="action" value="supprimer">
                <input type="submit" class="btn btn-danger mt-3 btn-projet" value="Supprimer">
            </form>
        </div>
    </div>
</div>

    <?php include '../commun/Footer.php'; ?>

</body>
</html>