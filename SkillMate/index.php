<?php session_start();?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" sizes="32*32" href="images/Logo_Blue.png">        

        <title>SkillMate</title>


        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">

        <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.3.0/model-viewer.min.js"></script>

        <script src="js/Jquery.min"></script>
        
        <script src="js/animateBackground/TweenLite.min.js"></script>
        <script src="js/animateBackground/EasePack.min.js"></script>
        <script src="js/animateBackground/rAF.js"></script>
        <script src="js/animateBackground/animateHeader.js" defer></script>

    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <a href="index.php" class="navbar-brand mx-auto mx-lg-0">
                      <img src="images/SkillMate_Logo.png" style="width: 35%; height: 35%;">
                      <span class="brand-text" style="color:white">Skill</span>Mate
                 </a>

                 <form class="d-flex ms-auto" action="Controller/Projet/projet.php" method="POST" form=>
                    <input class="form-control me-2" type="search" name="searchProj" placeholder="Rechercher" required>
                    <button class="btn btn-outline-light" value="search" name="action" type="submit">Rechercher</button>
                </form>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <div class="dropdown-container" id="dropdownContainer">
                                <a class="nav-link click-scroll" href="View/projet/Projets.php">Projets</a>
                                <div class="dropdown-content" id="dropdownContent">
                                    <?php
                                        if (isset($_SESSION['is_logged']) === false) { ?>
                                             <a href="View/connexion/Connexion.php">Crée un Projet</a>
                                    <?php } else { ?>
                                            <a href="View/projet/CreateProjet.php">Crée un Projet</a>
                                       <?php }
                                    ?>
                                    <div class="separation-element" style="outline: none;"></div>
                                    <a href="View/projet/Projets.php">Voir les Projets</a>
                                </div>
                              </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="View/contact/Contact.php">Contact</a>
                        </li>

                    <?php

                        if (isset($_SESSION['is_logged']) === false) {
                        // Utilisateur deconnecté
                        echo '<li class="nav-item">
                            <a class="nav-link custom-btn btn d-none d-lg-block" href="View/connexion/Connexion.php">Me connecter </a></li>';
                        } 
                        else {
                        // Utilisateur connecté 
                        echo '<div class="dropdown-container" id="dropdownContainer">
                                <img src="images/no_pp.png" style="cursor : pointer" class="img-fluid avatar-image dropdown-trigger" name="dropdownMenu"        >
                                <div class="dropdown-content" id="dropdownContent">
                                    <a href="View/profil/UpdateProfil.php?id=' . $_SESSION['InfoUser']['Profile_ID'] . '">Modifier Profil</a>
                                    <div class="separation-element" style="outline: none;"></div>
                                    <a href="View/profil/DetailProfil.php?id=' . $_SESSION['InfoUser']['Profile_ID'] . '">Votre Profil</a>
                                    <div class="separation-element" style="outline: none;"></div>
                                    <a href="Controller/Session/Controller_Logout.php">Déconnexion</a>
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

        <main>

        <section class="hero">
            <div id="large-header" name="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-12 m-auto">
                        <div class="hero-text">
                            <h1 class="mb-4 animate__animated animate__fadeInUp">
                                <span style="color:white">Skill</span><span style="color:#0dcaf0">Mate</span>
                            </h1>
                            <p class="mb-4 animate__animated animate__fadeInUp">Pour des Projets Gagnants</p>
                    <?php 

                        if (isset($_SESSION['is_logged']) === false) {
                            echo '<a href="View/inscription/Inscription.php" class="btn btn-primary btn-lg animate__animated animate__fadeInUp">Inscrivez-vous maintenant</a>';
                        }else{

                             $_SESSION['InfoUser']['Pseudo'];
                            } ?>
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



            <section class="about section-padding" id="histoire">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h2 class="mb-4">Notre <u class="text-info">Histoire</u></h2>
                        </div>

                        <div class="col-lg-6 col-12">
                            <h3 class="mb-3">SkillMate, où l'ambition prend vie. </h3>

                            <p>Partagez vos projets les plus audacieux et rassemblez une équipe de collaborateurs passionnés pour les concrétiser.</p>

                            <a class="custom-btn custom-border-btn btn custom-link mt-3 me-3" href="View/inscription/Inscription.php">S'inscrire</a>
                        </div>

                        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                            <h4 style="text-align:justify">SkillMate se démarque par sa simplicité. Nous avons simplifié le processus de publication de projets, de recherche de collaborateurs et de gestion de projets. Vous pouvez vous concentrer sur ce qui compte le plus : vos idées.</h4>


                    </div>
                </div>
            </section>


            <section class="createur section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 d-flex flex-column justify-content-center align-items-center">
                            <div class="createur-text-info">
                                <h2 class="mb-4">Notre <u class="text-info">Équipe</u></h2>
                                <p style="text-align:justify">SkillMate, c'est bien plus qu'une plateforme ; c'est une équipe unie qui croit en votre potentiel et qui est là pour vous soutenir à chaque étape de votre parcours vers la réalisation de vos projets.</p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-12">
                                    <div class="createur-thumb createur-thumb-small">
                                        <img src="images/no_pp.png" class="img-fluid createur-image" alt="">
                                        <div class="createur-info">
                                            <h5 class="createur-title mb-0">Sivan COZZO</h5>
                                            <p class="createur-text mb-0">Créateur</p>
                                            <ul class="social-icon">
                                                <li><a href="#" class="social-icon-link bi-facebook"></a></li>
                                                <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 col-12 text-center">
                                    <model-viewer
                                        class="img-fluid offset-md-2"
                                        src="Assets/SkillMate3D/3D_SkillMate_Blue.glb"
                                        alt="Model 3D logo"
                                        autoplay
                                        shadow-intensity="0"
                                        ar
                                        style="width: 100%; height: 100%;"
                                    ></model-viewer>
                                </div>


                            </div>
                        </div>

                        <div class="py-5"></div>
                        
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-12">
                                    <div class="createur-thumb createur-thumb-small">
                                        <img src="images/no_pp.png" class="img-fluid createur-image" alt="">
                                        <div class="createur-info">
                                            <h5 class="createur-title mb-0">Florent CARDOSO CRESPY</h5>
                                            <p class="createur-text mb-0">Créateur</p>
                                            <ul class="social-icon">
                                                <li><a href="#" class="social-icon-link bi-facebook"></a></li>
                                                <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 col-12 text-center">
                                    <model-viewer
                                        class="img-fluid offset-md-2"
                                        src="Assets/SkillMate3D/3D_SkillMate_White.glb"
                                        alt="Model 3D logo"
                                        autoplay
                                        shadow-intensity="0"
                                        ar
                                        style="width: 100%; height: 100%;"
                                    ></model-viewer>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="equipe section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h2 class="mb-5 text-center">Les <u class="text-info">Tendances</u></h2>

                            <div class="tab-content mt-5" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-DayOne" role="tabpanel" aria-labelledby="nav-DayOne-tab">
                                    <div class="row border-bottom pb-5 mb-5">
                                        <div class="col-lg-4 col-12">
                                            <img src="images/EduTechAI.jpg" class="equipe-image img-fluid project-image" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            
                                            <h4 class="mb-2">EduTechAI</h4>

                                            <p>EduTechAI révolutionnera l'apprentissage en ligne en utilisant l'intelligence artificielle pour personnaliser les cours en fonction des besoins de chaque élève.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="images/no_pp.png" class="img-fluid avatar-image " alt="">

                                                    <div class="ms-3">
                                                        Sivan COZZO
                                                        <p class="createur-text mb-0">Créateur</p>
                                                    </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    06/09/2023
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    Informatique
                                                </span>
                                            </div>
                                            <a class="custom-btn custom-border-btn btn custom-link mt-3 me-3" href="#">Rejoindre</a>
                                        </div>
                                    </div>

                                    <div class="row border-bottom pb-5 mb-5">
                                        <div class="col-lg-4 col-12">
                                            <img src="images/EcoDrive_Engine.jpg" class="equipe-image img-fluid project-image" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            <h4 class="mb-2">EcoDrive Engine</h4>

                                            <p>EcoDrive Engine développera des moteurs de véhicules écologiques, réduisant les émissions de gaz à effet de serre tout en améliorant la performance des véhicules.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="images/no_pp.png" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                    Florent CARDOSO CRESPY
                                                    <p class="createur-text mb-0">Créateur</p>
                                                </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    22/08/2023
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    Mécanique
                                                </span>
                                            </div>
                                            <a class="custom-btn custom-border-btn btn custom-link mt-3 me-3" href="#">Rejoindre</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <img src="images/HealthForecast_Pro.jpg" class="equipe-image img-fluid project-image" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            <h4 class="mb-2">HealthForecast</h4>

                                            <p>HealthForecast Pro anticipera les besoins de santé des patients en collectant et en analysant en temps réel les données médicales, améliorant ainsi la qualité des soins de santé et la gestion des ressources médicales.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="images/no_pp.png" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                        Emily Anderson
                                                    <p class="createur-text mb-0">Créateur</p>
                                                </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    27/08/2023
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    Santé
                                                </span>
                                                
                                            </div>
                                            <a class="custom-btn custom-border-btn btn custom-link mt-3 me-3" href="#">Rejoindre</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="call-to-action section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-7 col-12">
                            <h2 class="text-white mb-4">Rejoignez notre <u class="text-info">newsletter</u></h2>

                            <p class="text-white">Soyez à l'affût des projets les plus innovants ! Rejoignez SkillMate pour rester connecté à l'avant-garde de la collaboration créative.</p>
                        </div>

                        <div class="col-lg-3 col-12 ms-lg-auto mt-4 mt-lg-0">
                            <a href="#section_5" class="custom-btn btn">S'enregistrer</a>
                        </div>

                    </div>
                </div>
            </section>

            <section class="choixproj section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-12 text-center mb-5">
                            <h2>Faites votre <u class="text-info">Choix</u></h2>
                        </div>


            
                        <div class="col-lg-4 col-md-6 col-12 mb-5 mb-lg-0">
                            <div class="choixproj-thumb bg-white shadow-lg">                                
                                <div class="choixproj-title-wrap d-flex align-items-center justify-content-center">
                                    <h4 class="choixproj-title text-white mb-0">Créer un Projet</h4> 
                                </div>
                                <div class="choixproj-body text-center"> 
                                    <p>Créez votre propre projet et soyez le chef d'équipe. Dirigez le projet du début à la fin, coordonnez les tâches et collaborez avec votre équipe pour atteindre vos objectifs.</p>
                                    <?php
                                        if (isset($_SESSION['is_logged']) === false) { ?>
                                            <a class="custom-btn btn mt-3" href="View/connexion/Connexion.php">Commencer</a>
                                    <?php } else { ?>
                                            <a class="custom-btn btn mt-3" href="View/projet/CreateProjet.php">Commencer</a>
                                       <?php }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mb-5 mb-lg-0">
                            <div class="choixproj-thumb bg-white shadow-lg">                                
                                <div class="choixproj-title-wrap d-flex align-items-center justify-content-center"> 
                                    <h4 class="choixproj-title text-white mb-0">Rejoindre un Projet</h4> 
                                </div>
                                <div class="choixproj-body text-center"> 
                                    <p>Rejoignez des projets passionnants en tant que collaborateur. Contribuez à des projets ambitieux, échangez des idées avec l'équipe et faites partie de la réalisation de grands projets.</p>
                                    <a class="custom-btn btn mt-3" href="View/projet/Projets.php">Rejoindre</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            
            

            <section class="contact section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form bg-white shadow-lg" action="Controller/Contact/Controller_Contact.php" method="post" role="form" autocomplete="off">
                                <h2>Nous contacter</h2>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">                                    
                                        <input type="text" name="Nom" id="name" class="form-control" placeholder="Nom" required="">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-12">         
                                        <input type="email" name="Email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required="">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-12" >                                    
                                        <input type="text" name="Sujet" id="subject" class="form-control" placeholder="Sujet">
                                    </div>

                                    <div class="col-12" >
                                        <textarea class="form-control" rows="5" id="message" name="Message" placeholder="Message" style="max-width: 756px; max-height:150px;min-width:756px;min-height:150px"></textarea>

                                        <input type="hidden" value="ajouter" name="action">
                                        <button type="submit" class="form-control">Valider</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

        </main>
        
        <footer class="site-footer" style="background:#1f2642" >
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 col-12 border-bottom pb-5 mb-5">
                        <div class="d-flex">
                            <a href="index.php" class="navbar-brand mx-auto mx-lg-0">
                                <img src="images/SkillMate_Logo.png">
                                <span class="brand-text" style="color:white">Skill</span>Mate
                            </a>

                            <ul class="social-icon ms-auto">
                                <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                                <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                                <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                            </ul>
                        </div>
                    </div>

                        <div class="col-lg-7 col-12">
                            <ul class="footer-menu d-flex flex-wrap">
                                <li class="footer-menu-item"><a href="#histoire" class="footer-menu-link">Notre histoire</a></li>

                                <li class="footer-menu-item"><a href="View/inscription/Inscription.php" class="footer-menu-link">Inscription</a></li>

                                <li class="footer-menu-item"><a href="View/connexion/Connexion.php" class="footer-menu-link">Connexion</a></li>

                                <li class="footer-menu-item"><a href="View/projet/Projets.php" class="footer-menu-link">Projets</a></li>

                                <?php
                                    if (isset($_SESSION['is_logged']) === false) {
                                        
                                    } else {
                                        echo '<li class="footer-menu-item"><a href="View/signalement/signalement.php" class="footer-menu-link">Signalement</a></li>';
                                    }
                                ?>
                            </ul>
                        </div>  
                    </div>

                </div>
            </div>
        </footer>


    </body>
</html>

