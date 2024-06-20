<?php include '../commun/Header.php'; ?>

        <title>SkillMate - Connexion</title>

    </head>
    
    <body>

    <?php include "../commun/Navbar.php" ?>


    <section class="contact section-padding">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-5 col-12 mx-auto">
                    <form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/Session/Controller_Connexion.php" method="POST" role="form" autocomplete="off">
                        <h2>Connexion</h2>
                        <div class="row">

                            <div class="col-12">                                    
                                <input type="text" name="Pseudo" id="Pseudo" class="form-control" placeholder="Nom d'utilisateur" required>
                            </div>
                            <div class="col-12">         
                                <input type="password" name="Password" id="Password" class="form-control" placeholder="Mot de passe" required>
                            </div>
                            <div class="col-12 pb-3">
                                <button type="submit" class="form-control">Se connecter</button>
                            </div>
                            <div class="form-log">
                                <a href="../inscription/Inscription.php">S'inscrire</a>
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
