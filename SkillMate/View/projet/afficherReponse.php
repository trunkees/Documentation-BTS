<?php
include '../commun/Header.php';
include '../../BDD/BDD.php';

if (isset($_GET['projet_id'])) {
    $projet_id = $_GET['projet_id'];
} else {
    echo "ID du projet non spécifié";
    exit;
}

if (isset($_GET['id'])) {
    $profile_id = $_GET['id'];
} else {
    echo "ID du profil non spécifié";
    exit;
}

if (isset($_GET['id_demande'])) {
    $id_demande = $_GET['id_demande'];
} else {
    echo "ID de la demande non spécifié";
    exit;
}
$sql = "SELECT * FROM Questionnaire WHERE Projet_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$projet_id]);
$question = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM ReponseFormulaire WHERE Profile_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$profile_id]);
$reponses = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM Profil WHERE Profile_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$profile_id]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM DemandesProjet WHERE id_demande = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$id_demande]);
$demande = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<title>SkillMate - Réponses au Questionnaire</title>

</head>

<body>
    <?php include "../commun/Navbar.php"; ?>

    <section class="contact section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="mt-5">Réponses au Questionnaire : <?php echo $userData['Pseudo']; ?></h2>
                    <?php if (count($question) > 0) : ?>
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>Réponse</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reponses as $reponses) : ?>
                                    <tr>
                                        <td><?php echo $reponses['reponse'];?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <td>
                                <a href="../../Controller/Projet/DemandeProjet.php?action=accepter&id_demande=<?php echo $demande['id_demande'];?>&pseudo=<?php echo $userData['Pseudo']?>">Accepter</a>
                                <a href="../../Controller/Projet/DemandeProjet.php?action=refuser&id_demande=<?php echo $demande['id_demande']; ?>">Refuser</a>
                            </td>
                        </table>
                    <?php else : ?>
                        <p>Aucune réponse au questionnaire pour cet utilisateur.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include "../commun/Footer.php"; ?>

</body>

</html>
