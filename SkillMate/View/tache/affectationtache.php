<?php
include '../commun/Header.php';
include '../../BDD/BDD.php';

if (isset($_GET['id'])) {
    $projet_id = $_GET['id'];
}

$sql = "SELECT * FROM MembreProjet WHERE Projet_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$projet_id]);
$resultPseudo = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM Tache WHERE Projet_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$projet_id]);
$resultTache = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillMate - Créer une Tâche</title>
</head>

<body>

    <?php include "../commun/Navbar.php"; ?>

    <section class="contact section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h1>Affecter une tâche</h1>
                    <form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/Tache/ControllerTache.php" method="POST" role="form" autocomplete="off">

                        <div class="row">

                            <label for="profile_id">Utilisateur :</label>
                            <select name="profile_id" required>
                                <?php
                                foreach ($resultPseudo as $pseudo) {
                                    echo "<option value=\"{$pseudo['Profile_ID']}\">{$pseudo['Pseudo']}</option>";
                                }
                                ?>
                            </select><br>

                            <label for="tache_id">Tâche :</label>
                            <select name="tache_id" required>
                                <?php
                                foreach ($resultTache as $tache) {
                                    echo "<option value=\"{$tache['TacheID']}\">{$tache['Intitule']}</option>";
                                }
                                ?>
                            </select><br>

                            <input type="hidden" name="dateAffectation" value="<?php echo date('d-m-Y'); ?>">

                            <input type= "hidden" name="pseudo" value="<?php echo $pseudo['Pseudo'];?>">

                            <input type="hidden" name="projet_id" value="<?php echo $projet_id; ?>">

                            <input type="hidden" value="affecter" name="action">
                            <button type="submit" class="form-control">Créer la tâche</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include "../commun/Footer.php" ?>

</body>

</html>
