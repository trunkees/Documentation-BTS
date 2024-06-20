<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a href="../../index.php" class="navbar-brand mx-auto mx-lg-0">
            <img src="../../images/SkillMate_Logo.png" style="width: 35%; height: 35%;">
            <span class="brand-text" style="color:white">Skill</span>Mate
        </a>

        <form class="d-flex ms-auto" action="index.php?action=search" method="post">
            <input class="form-control me-2" type="search" name="searchProj" placeholder="Rechercher" required>
            <button class="btn btn-outline-light" type="submit">Rechercher</button>
        </form>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="../../index.php">Accueil</a>
                </li>

                <li class="nav-item">
                            <div class="dropdown-container" id="dropdownContainer">
                                <a class="nav-link click-scroll" href="../../View/projet/Projets.php">Projets</a>
                                <div class="dropdown-content" id="dropdownContent">
                                    <?php
                                        if (isset($_SESSION['is_logged']) === false) { ?>
                                            <a href="../../View/connexion/Connexion.php">Crée un Projet</a>
                                    <?php } else { ?>
                                            <a href="../../View/projet/CreateProjet.php">Crée un Projet</a>
                                       <?php }
                                    ?>
                                    <div class="separation-element" style="outline: none;"></div>
                                    <a href="../../View/projet/Projets.php">Voir les Projets</a>
                                </div>
                              </div>
                        </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="../contact/Contact.php">Contact</a>
                </li>

                <?php

                        if (isset($_SESSION['is_logged']) === false) {
                        // Utilisateur deconnecté
                        echo '<li class="nav-item">
                            <a class="nav-link custom-btn btn d-none d-lg-block" href="../connexion/Connexion.php">Me connecter </a></li>';
                        } 
                        else {
                        // Utilisateur connecté 
                        echo '<div class="dropdown-container" id="dropdownContainer">
                                <img src="../../images/no_pp.png" style="cursor : pointer" class="img-fluid avatar-image dropdown-trigger" name="dropdownMenu">
                                <div class="dropdown-content" id="dropdownContent">
                                    <a href="../profil/UpdateProfil.php?id=' . $_SESSION['InfoUser']['Profile_ID'] . '">Modifier Profil</a>
                                    <div class="separation-element" style="outline: none;"></div>
                                    <a href="../profil/DetailProfil.php?id=' . $_SESSION['InfoUser']['Profile_ID'] . '">Votre Profil</a>
                                    <div class="separation-element" style="outline: none;"></div>
                                    <a href="../../Controller/Session/Controller_Logout.php">Déconnexion</a>
                                </div>
                              </div>'; }
                    ?>

                    <script>
                        // afficher le menu déroulant lors du survol du conteneur
                        var dropdownContainer = document.getElementById('dropdownContainer');
                        var dropdownContent = document.getElementById('dropdownContent');
                        var timeoutId;

                        dropdownContainer.addEventListener('mouseover', function () {
                            clearTimeout(timeoutId);
                            dropdownContent.style.display = 'block';
                        });

                        // masquer le menu déroulant lorsque la souris quitte le conteneur
                        dropdownContainer.addEventListener('mouseleave', function () {
                            timeoutId = setTimeout(function () {
                                dropdownContent.style.display = 'none';
                            }, 200); // ajustez la durée en millisecondes selon vos besoins
                        });

                        // masquer le menu déroulant lorsque la souris quitte le contenu
                        dropdownContent.addEventListener('mouseleave', function () {
                            timeoutId = setTimeout(function () {
                                dropdownContent.style.display = 'none';
                            }, 200); // ajustez la durée en millisecondes selon vos besoins
                        });
                    </script>
            </ul>
        <div>      
    </div>
</nav>