<?php include '../commun/Header.php';
	  include '../../BDD/BDD.php';
	
	if (isset($_GET['id'])) {
	    $Profile_id = $_GET['id'];
		

	} else {
	    echo "ID du profil non spécifié";
	    exit;
	}

		$sql = "SELECT * FROM Profil WHERE Profile_ID = ?";
		$stmt = $bdd->prepare($sql);
		$stmt->execute([$Profile_id]);

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
	    $Localisation = $profilData['Localisation']; 
	    $currentProfilID = $_GET['id']; ?>

	<title>SkillMate - <?php echo "$Pseudo"; ?></title>

</head>

<body>
	<?php 
		include '../../Controller/Profil/selectAllProfil.php';
		include '../commun/Navbar.php'; ?>

  <div class="project-container">
        <div class="project-details">
                	<div class="DetailTitle"><h2 class="card-title-white"><?php echo "$Nom $Prenom"; ?></h2><br>
                	<div class="detailPseudo"><p class="card-text">@<?php echo $Pseudo; ?></p></div></div>
                    <div class="card-body-detail">
                        <br>
                        
                        <p class="card-text"><strong>Biographie :</strong><br> <div class="txtDetail"><?php echo $Bio; ?></p></div>
                        <p class="card-text"><strong>Email :</strong><br> <div class="txtDetail"><?php echo $Email; ?></div></p>
                        <p class="card-text"><strong>Telephone :</strong><br> <div class="txtDetail"><?php echo $Telephone; ?></div></p>
                        <p class="card-text"><strong>Date de naissance :</strong><br> <div class="txtDetail"><?php echo $Datenaissance; ?></div></p>
                        <p class="card-text"><strong>Genre :</strong><br> <div class="txtDetail"><?php echo $Genre; ?></div></p>
                        <?php if (isset($Lien) && !empty($Lien)) { ?>
                        	<p class="card-text"><strong>Lien :</strong><br> <div class="txtDetail"><a href="<?php echo $Lien;?>"><u><?php echo $profilData['NomLien'];?></a></div></p></u>

                        <?php }else{
                        }
                        ?>
                        <p class="card-text"><strong>Localisation :</strong><br> <div class="txtDetail"><?php echo $Localisation; ?></div></p>
                        <div class="placeButtonCopy"><?php include '../commun/buttonCopyProfil.php'; ?></div>
                    </div>
                </div>
            </div>



        <?php include '../commun/Footer.php'; ?>

    </body>

    </html>

<?php
} else {
    echo "Profil non trouvé.";
}
?>