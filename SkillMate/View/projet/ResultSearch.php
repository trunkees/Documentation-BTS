<?php include '../commun/Header.php'; ?>

        <title>SkillMate - Les Projets</title>

        <style>
            .custom-card {
                height: 100%;
            }
            .custom-card .card-img-top {
                height: 100%;
                object-fit: cover;
            }
            .custom-card:hover .custom-btn {
                
                background-color: #007bff; 
                color: white; 
            }
            .card-link {
            cursor: pointer;
        }
        </style>
            

    </head>
    
    <body>

    <?php 
        include "../commun/Navbar.php";
        include "../../Controller/Projet/selectAllProjet.php"; ?>


    <main class="container mt-5">
        <div class="row">

        <?php foreach ($allProjet as $projet){ ?>
            <div class="col-md-4 mb-4">
                <div class="card custom-card">
                        <img src="../../images/EcoDrive_Engine.jpg"  class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title"><strong><?php echo $projet['Nom']; ?></strong></h5>
                        <p class="card-text"><?php echo $projet['Description']; ?></p>
                        <p class="card-text"><strong>Créateur : </strong><?php echo $projet['Createur']; ?></p>
                        <p class="card-text"><strong>Date de début : </strong><?php echo $projet['DateCreation']; ?></p>
                        <a class="custom-btn" href="DetailProjet.php?id=<?php echo $projet['Projet_ID']; ?>">Détails du Projet</a>
                    </div>
                </div>
            </div>
        <?php } ?>
           
        </div>
    </main>
        
        
    <?php include "../commun/Footer.php" ?>


    </body>
</html>

