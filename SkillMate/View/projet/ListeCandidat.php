<?php
include '../commun/Header.php';
include '../../BDD/BDD.php';

if (isset($_GET['id'])) {
    $projet_id = $_GET['id'];
} else {
    echo "ID du projet non spécifié";
    exit;
}

$sql = "SELECT D.id_demande, P.Pseudo, D.date_demande, P.profile_id
        FROM DemandesProjet D
        JOIN Profil P ON D.profile_id = P.Profile_ID
        WHERE D.id_projet = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$projet_id]);
$candidats = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM Projet WHERE Projet_ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$projet_id]);
$projetData = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<title>SkillMate - Liste des Candidats</title>

</head>

<body>
    <?php include "../commun/Navbar.php"; 
    
    ?>

    <section class="contact section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="mt-5">Liste des Candidats du projet : <?php echo $projetData['Nom']; ?></h2>
                    <?php if (count($candidats) > 0) : ?>
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Date d'Envoi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($candidats as $candidat) : ?>
                                    <tr>
                                        <td><?php echo $candidat['Pseudo']; ?></td>
                                        <td><?php echo $candidat['date_demande']; ?></td>
                                        <td>
                                            <a href="afficherReponse.php?id=<?php echo $candidat['profile_id']; ?>&id_demande=<?php echo $candidat['id_demande'] ?>&projet_id=<?php echo $projetData['Projet_ID'] ?>">Voir les réponses</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Aucun candidat n'a répondu au questionnaire pour ce projet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include "../commun/Footer.php"; ?>

</body>

</html>



















a