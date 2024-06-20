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
        <form class="mb-4" id="filter-form">
            <div class="row g-2">
                <div class="col-md-3">
                    <label for="categorySelect" class="form-label">Catégorie</label>
                    <select class="form-select" id="categorySelect">
                        <option value="toutes">Toutes les catégories</option>
                        <option value="categorie1">Catégorie 1</option>
                        <option value="categorie2">Catégorie 2</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="statusSelect" class="form-label">Statut</label>
                    <select class="form-select" id="statusSelect">
                        <option value="tous">Tous les statuts</option>
                        <option value="en_cours">En cours</option>
                        <option value="termine">Terminé</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="dateSelect" class="form-label">Date de début</label>
                    <select class="form-select" id="dateSelect">
                        <option value="toutes_dates">Toutes les dates</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn custom-btn">Filtrer</button>
                </div>
                
            </div>
        </form>
        <div class="row">

        <?php foreach ($allProjet as $projet){ ?>
            <div class="col-md-4 mb-4">
                <div class="card custom-card">
                        <img src="../../images/EcoDrive_Engine.jpg"  class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title"><strong><?php echo $projet['Nom']; ?></strong></h5>
                        <p class="card-text"><strong>Description : </strong><?php echo $projet['Description']; ?></p>
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

