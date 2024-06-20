<?php
include '../commun/Header.php';
include '../../BDD/BDD.php';

error_reporting(0);
ini_set('display_errors', 0);

if (isset($_GET['id'])) {
    $projet_id = $_GET['id'];
} else {
    echo "ID du projet non spécifié";
    exit;
}

$profile_id = $_SESSION['InfoUser']['Profile_ID'];


$sql = "SELECT Pseudo FROM MembreProjet WHERE Projet_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$projet_id]);
$membres = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

<title>SkillMate - Liste des Membres</title>


</head>

<body>
    <?php include "../commun/Navbar.php"; ?>

    <section class="contact section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="mt-5">Liste des Membres du projet : <?php echo $ProjetNom; ?></h2>
                    <?php if (count($membres) > 0) : ?>
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($membres as $membre) : 

                                    ?>
                                    <tr>
                                        <td class="membrproj">
                                        <div class="pseudo-container">
                                            <?php echo $membre['Pseudo']; ?> 
                                        </div>

                                        <?php if ($roleData['Role'] === 'Créateur') { ?>
                                            <div class="boutonmembre">
                                                <form method="POST" action="../../Controller/Membre/MembreProjetController.php">
                                                    <input type="hidden" name="deletemembreprojet" value="<?php echo $membre['Pseudo']; ?>">
                                                    <input type="hidden" name="action" value="supprimer">
                                                    <input type="submit" class="btn btn-danger mt-3 btn-projet" value="Supprimer le membre">
                                                </form>

                                                <form method="POST" action="../../Controller/Membre/MembreProjetController.php">
                                                    <input type="hidden" name="promouvoir" value="<?php echo $membre['Pseudo']; ?>">
                                                    <input type="hidden" name="action" value="promouvoir">
                                                    <input type="submit" class="btn btn-success mt-3 btn-promouvoir" value="Promouvoir">
                                                </form>

                                                <form method="POST" action="../../Controller/Membre/MembreProjetController.php">
                                                    <input type="hidden" name="releguer" value="<?php echo $membre['Pseudo']; ?>">
                                                    <input type="hidden" name="action" value="releguer">
                                                    <input type="submit" class="btn btn-success mt-3 btn-releguer" value="Reléguer">
                                                </form>
                                            </div>
                                        <?php } ?>

                                        </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Aucun membre n'est associé à ce projet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include "../commun/Footer.php"; ?>

</body>

</html>
