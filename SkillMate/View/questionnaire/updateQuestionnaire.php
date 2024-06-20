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

        <script>
            $(document).ready(function(){
                var maxField = 10; //Input fields increment limitation
                var addButton = $('.add_button'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML = '<section><label>Formulez votre nouvelle question :</label><div class="alignRemove"><input type="text" class="form-control" name="field_name[]" value="" required /><a href="javascript:void(0);" class="remove_button"><i class="bi bi-x-circle"></i></a></div></section>'; //New input field html 
                var x = 1; //Initial field counter is 1
                
                // Once add button is clicked
                $(addButton).click(function(){
                    //Check maximum number of input fields
                    if(x < maxField){ 
                        x++; //Increase field counter
                        $(wrapper).append(fieldHTML); //Add field html
                    }else{
                        addButton.hide();
                    }
                });
                
                // Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e){
                    e.preventDefault();
                    $(this).closest('section').remove(); //Remove field html
                    x--; //Decrease field counter
                });
            });
        </script>

    <?php include "../../Controller/Questionnaire/selectAllQuestionnaire.php";
          include "../commun/Navbar.php"; ?>

<?php var_dump($questionnaireData['QuestionnaireID']); ?>

    <section class="contact section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/Questionnaire/questionnaire.php" method="post" role="form">
                        <h2>Modifier Questionnaire</h2>

                        <div class="row">

                                <div class="field_wrapper">
                                    <div>
                                        <label>Question :</label>
                                        <input type="text" class="form-control" name="field_name[]" value="" required />
                                    </div>
                                </div>
                                    <a href="javascript:void(0);" class="add_button" title="Add field"><i class="bi bi-plus-circle"></i></a>

                                <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="DateCreation">
                                <input type="hidden" value="<?php echo $questionnaireData['QuestionnaireID']; ?>" name="QuestionnaireID">
                                <input type="hidden" value="<?php echo $projet_id; ?>" name="Projet_ID">

                                <input type="hidden" value="update" name="action">
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
