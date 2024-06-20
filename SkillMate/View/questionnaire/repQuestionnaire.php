<?php include '../commun/Header.php';
      include '../../BDD/BDD.php';

    if (isset($_GET['id'])) {
        $projet_id = $_GET['id'];

    } else {
        // Gérer le cas où l'ID n'est pas fourni dans l'URL
        echo "ID du projet non spécifié";
        exit;
    }

        $sql = "SELECT * FROM Questionnaire WHERE Projet_ID = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$projet_id]);

        if ($questionnaireData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            } else {
        echo "Projet non trouvé.";
    }
    ?>


        <title>SkillMate - Questionnaire</title>

    </head>
    
    <body>
    <?php include "../../Controller/Questionnaire/selectAllQuestionnaire.php";
          include "../commun/Navbar.php"; ?>

    <section class="contact section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/RepQuestionnaire/repQuestionnaire.php" method="post" role="form">
                        <h2>Questionnaire</h2>

                        <div class="row">

                                <?php foreach ($allQuestionnaire as $questionnaire){ 
                                    if ($projet_id == $questionnaire['Projet_ID']) {
                                        echo $questionnaire['field_name']." :"; ?>
                                        <input type="text" class="form-control" name="reponse[]" value="" required />
                                    <?php }
                                 } ?>

                                <input type="hidden" value="<?php echo $projet_id; ?>" name="Projet_ID">
                                <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="DateSoumission">
                                <input type="hidden" value="<?php echo $_SESSION['InfoUser']['Pseudo']; ?>" name="Profile">
                                <input type="hidden" value="<?php echo $_SESSION['InfoUser']['Profile_ID']; ?>" name="Profile_ID">

                                <input type="hidden" value="ajouter" name="action">
                                <button type="submit" class="form-control questionnaireValider">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
        
    <?php include "../commun/Footer.php"; ?>

    </body>
</html>
