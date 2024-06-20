<?php include '../commun/Header.php'; ?>

        <title>SkillMate - Créer un Projet</title>

</head>

<body>
	
	<?php include "../commun/Navbar.php"; ?>
		<section class="contact section-padding">
			<div class="container">
    			<div class="row">

        			<div class="col-lg-8 col-12 mx-auto">
						<h1>Créer un nouveau projet</h1>
						<form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/Projet/projet.php" method="POST" role="form" autocomplete="off">		
							
                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-12">    
                                    <input type="text" name="Nom" id="name" class="form-control" placeholder="Nom du Projet" style="width: 756px;" required="">
                                </div>

                                <div class="col-12" >
                                    <textarea class="form-control" rows="5" id="Description" name="Description" placeholder="Description" required style="max-width: 756px; max-height:150px;min-width:756px;min-height:150px"></textarea>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12" >                                    
                                    <input type="text" name="Budget" id="Budget" class="form-control" placeholder="Budget" oninput="this.value = this.value.replace(/[^0-9]/g, '');required">
                                </div>

                                <div class="col-lg-4 col-md-4 col-12" >                                    
                                    <input type="text" name="Localite" id="Localite" class="form-control" placeholder="Localite" required>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12" >                                    
                                    <input type="text" name="Domaine" id="Domaine" class="form-control" placeholder="Domaine" required>
                                </div>

                                <input type="hidden" name="Createur" value="<?php echo $_SESSION['InfoUser']['Pseudo']; ?>">
                                <input type="hidden" name="Profile_ID" value="<?php echo $_SESSION['InfoUser']['Profile_ID']; ?>">                                

                                <input type="hidden" name="DateCreation" value="<?php echo date('d-m-Y'); ?>">
                                <input type="hidden" name="StatutProjet" value="0">

                                <input type="hidden" value="ajouter" name="action">
                                <button type="submit" class="form-control">Créer le projet</button>

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

