<?php
include '../commun/Header.php'; 
include '../../BDD/BDD.php';


$profile_id = $_SESSION['InfoUser']['Profile_ID'];

if (isset($_GET['id'])) {
    $projet_id = $_GET['id'];

    $sql = "SELECT COUNT(*) as count FROM Questionnaire WHERE Projet_ID = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$projet_id]);
    $questionExists = $stmt->fetch(PDO::FETCH_ASSOC);

} else {
    echo "ID du projet non spécifié";
    exit;
}

$sql = "SELECT * FROM Projet WHERE Projet_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$projet_id]);

if ($projetData = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $ProjetNom = $projetData['Nom'];
    $Description = $projetData['Description'];
    $Createur = $projetData['Createur'];
    $DateCreation = $projetData['DateCreation'];
    $Domaine = $projetData['Domaine'];
    $Budget = $projetData['Budget'];
    $Localite = $projetData['Localite'];
    $StatutProjet = $projetData['StatutProjet']; 
    $currentProjetID = $_GET['id'];
} 

$sqlRole = "SELECT Role FROM Profil WHERE Profile_ID = ?";
$stmtRole = $bdd->prepare($sqlRole);
$stmtRole->execute([$profile_id]);
$roleData = $stmtRole->fetch(PDO::FETCH_ASSOC);

?>

<title>SkillMate - <?php echo "$ProjetNom"; ?></title>

</head>

<body>
    <?php 
    include '../../Controller/Projet/selectAllProjet.php';
    include '../commun/Navbar.php'; ?>
        
    <div class="project-container">
        <div class="project-details">
            <div class="DetailTitle"><h2 class="card-title-white"><?php echo "$ProjetNom"; ?></h2></div>

            <div class="card-body-detail">
                <div class="placeButtonCopy">
                    <?php include '../commun/buttonCopyProjet.php'; ?><br>
                    <?php
                        if (isset($_SESSION['is_logged']) === false) { ?>
                            <a href="../connexion/Connexion.php"> <button type="submit" class="like-button" name="like"><i class="bi bi-suit-heart-fill"></i></button> </a>
                    <?php } else {
                            include('../commun/likeButton.php');
                        }
                    ?>
                    
                </div>

                <p class="card-text"><strong>Description : </strong><br> <div class="txtDetail"><?php echo $Description; ?></p></div>

                <p class="card-text"><strong>Créateur : </strong><br> <div class="txtDetail">@<?php echo $Createur; ?></p></div>

                <p class="card-text"><strong>Date de début : </strong><br> <div class="txtDetail"><?php echo $DateCreation; ?></p></div>

                <p class="card-text"><strong>Domaine : </strong><br> <div class="txtDetail"><?php echo $Domaine; ?></p></div>

                <p class="card-text"><strong>Budget : </strong><br> <div class="txtDetail"><?php echo $Budget; ?></p></div>

                <p class="card-text"><strong>Localisation : </strong><br> <div class="txtDetail"><?php echo $Localite; ?></p></div>

                <?php if ($StatutProjet === '0') : ?>
                    <p class="card-text"><strong>Statut du Projet : <br> <div class="txtDetail"></strong><span class="en-cours">En cours</span></p></div>
                <?php else : ?>
                    <p class="card-text"><strong>Statut du Projet : <br> <div class="txtDetail"></strong><span class="termine">Terminé</span></p></div>
                <?php endif; ?>

            </div>

			
			
			

            <div class="project-actions">
            	<a class="btn btn-primary mt-3 btn-projet" href="MembreProjet.php?id=<?php echo $currentProjetID; ?>">Membre du Projet</a>

            <?php if ($_SESSION['is_logged'] === true) { ?>
            	
                <?php if ($roleData['Role'] === 'Créateur' && $questionExists['count'] <= 0) { ?>
				    <a class="btn btn-primary mt-3 btn-projet" href="../questionnaire/questionnaire.php?id=<?php echo $currentProjetID; ?>">Faire un Questionnaire</a>
				<?php } elseif ($roleData['Role'] === 'Créateur' && $questionExists['count'] > 0) { ?>
				    <a class="btn btn-primary mt-3 btn-projet" href="../questionnaire/deleteQuestionnaire.php?id=<?php echo $currentProjetID; ?>">Supprimer le questionnaire</a>
				<?php } ?>

					<?php
						if ($roleData['Role'] === "UserSimple") {
							if ($_SESSION['is_logged'] === true) {
							echo '<a class="btn btn-primary mt-3 btn-projet" href="../questionnaire/repQuestionnaire.php?id=' . $currentProjetID . '">Candidaté</a>';
						}
						else {
							echo '<a class="btn btn-primary mt-3 btn-projet" href="../connexion/Connexion.php">Candidaté</a>';
						}
					}
				}
					?>
					

					
					
                

			

                <br><br>

                <?php
                    if ($roleData['Role'] === 'Créateur') {
                        echo '<a class="btn btn-primary mt-3 btn-projet" href="UpdateProjet.php?id=' . $currentProjetID . '">Modifier Projet</a>';
						echo '<a class="btn btn-primary mt-3 btn-projet" href="ListeCandidat.php?id=' . $currentProjetID . '">Liste des Candidats</a>';
				 } ?>
				<?php if ($roleData['Role'] === 'Créateur' || $roleData['Role'] === 'ChefEquipe') { 
						echo '<a class="btn btn-primary mt-3 btn-projet" href="../tache/creationtache.php?id=' . $currentProjetID . '">Créer une tache</a>';
						echo '<a class="btn btn-primary mt-3 btn-projet" href="../tache/affectationtache.php?id=' . $currentProjetID . '">affecter une tache</a>';
                    }
                ?>
                
                
            </div>
        </div>
    </div>

    <?php include '../commun/Footer.php';?>
</body>
</html>
