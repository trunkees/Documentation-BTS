<?php include '../commun/Header.php'; 

    if (isset($_GET['id'])) {
        $projet_id = $_GET['id']; } ?>

        <title>SkillMate - Créer une Tache</title>

        

</head>

<body>
	
	<?php include "../commun/Navbar.php"; ?>
		<section class="contact section-padding">
			<div class="container">
    			<div class="row">

        			<div class="col-lg-8 col-12 mx-auto">
						<h1>Créer une nouvelle tache</h1>
						<form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/Tache/ControllerTache.php" method="POST" role="form" autocomplete="off">		
							
                            <div class="row">

                            <label for="intitule">Nom de la tache :</label>
                                <div class="col-lg-4 col-md-4 col-12">    
                                    <input type="text" name="intitule" id="intitule" class="form-control" placeholder="Nom de la tache" style="width: 756px;" required="">
                                </div>

                                <label for="description">Description :</label>
                                <div class="col-12" >
                                    <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description" style="max-width: 756px; max-height:150px;min-width:756px;min-height:150px"></textarea>
                                </div>

                                <label for="secteur">Secteur :</label>
                                <div class="col-lg-4 col-md-4 col-12" >                                    
                                    <input type="text" name="secteur" id="secteur" class="form-control" placeholder="Secteur">
                                </div>

                                <input type="hidden" name="dateCreation" value="<?php echo date('d-m-Y'); ?>">

                                <label for="dateDebut">Date de début (souhaité) :</label>
                                <div class="col-lg-4 col-md-4 col-12" >                                    
                                    <input type="date" name="dateDebut" id="dateDebut" class="form-control">
                                </div>

                                <label for="dateFin">Date de Fin (souhaité) :</label>
                                <div class="col-lg-4 col-md-4 col-12" >                                    
                                    <input type="date" name="dateFin" id="dateFin" class="form-control">
                                </div>

                                <label>Statut de la tache:</label>
                                <select name="statut_tache" class="col-lg-4 col-md-4 col-12" required>
                                    <option value="En cours">En cours</option>
                                    <option value="En attente">En attente</option>
                                    <option value="bloque">bloqué</option>
                                    <option value="termine">terminé</option>
                                </select>

                                <label>Classification:</label>
                                <select name="classification" class="col-lg-4 col-md-4 col-12" required>
                                    <option value="En cours">Faible</option>
                                    <option value="En attente">Moyen</option>
                                    <option value="bloque">Urgent</option>
                                </select>

                                <input type="hidden" name="projet_id" value="<?php echo $projet_id; ?>">

                                <input type="hidden" value="ajouter" name="action">
                                <button type="submit" class="form-control">Créer la tache</button>

                                </div>

                            </div>
						</form>
					</div>
				</div>
			</div>
		</section>
    <?php include "../commun/Footer.php" ?>
</body>
</html>

