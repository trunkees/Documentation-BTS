<?php include '../commun/Header.php'; ?>

        <title>SkillMate - Inscription</title>

    </head>
    
    <body>

    <?php include "../commun/Navbar.php" ?>


    <section class="contact section-padding">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto">
                    <form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/Session/Controller_Inscription.php" method="POST" role="form" autocomplete="off">
                        <h2>Inscription</h2>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="Prenom">Prénom</label>
                                <input type="text" name="Prenom" id="Prenom" class="form-control" placeholder="Prénom" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="Nom">Nom</label>
                                <input type="text" name="Nom" id="Nom" class="form-control" placeholder="Nom" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="Email">Email</label>
                                <input type="email" name="Email" id="Email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="Telephone">Numéro de téléphone</label>
                                <input type="text" class="form-control" id="Telephone" name="Telephone" pattern="[0-9]{10}" title="Le numéro de téléphone doit contenir 10 chiffres" required>
                            </div>


                            <div class="col-md-6 form-group">
                                <label for="Genre">Genre</label>
                                <select name="Genre" id="Genre" class="form-control" required>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label for="age">Date Naissance</label>
                                <input type="date" name="Datenaissance" id="Datenaissance" class="form-control" placeholder="Date de Naissance" required>
                            </div>

                            <div class="col-12 form-group">
                                <label for="cv">Ajouter votre CV</label>
                                <input type="file" name="cv" id="cv" class="form-control" required>
                            </div>

                            <div class="col-12 form-group">
                                <label for="photo">Inssérer une photo</label>
                                <input type="file" name="photo" id="photo" class="form-control" required>
                            </div>

                            <div class="col-12 form-group">
                                <label for="biographie">Biographie</label>
                                <textarea name="Bio" id="Bio" class="form-control" placeholder="Biographie" required></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label for="Localisation">Localisation</label>
                                <input type="text" name="Localisation" id="Localisation" class="form-control" placeholder="Ville, Pays" required>
                            </div>

                            <div class="col-12 form-group">
                                <label for="Pseudo">Pseudo</label>
                                <input type="text" name= "Pseudo" id="Pseudo" class="form-control" placeholder="Pseudo" required>
                            </div>
                            <div class="col-12 form-group">
                                <label for="Password">Mot de passe</label>
                                <input type="password" name="Password" id="Password" class="form-control" placeholder="Mot de passe" required>
                            </div>

                            <div class="col-12 form-group">
                            <label for="VerificationCode">Code de vérification</label>
                            <input type="text" name="VerificationCode" id="VerificationCode" class="form-control" placeholder="Entrez le code de vérification" required>
                            <input type="submit" required>

                            </div>

                            <div class="col-12 form-group">
                                <a href="" class="text-center">Mention légale</p>
                            </div>

                            <div class="col-12 form-group pb-3">
                                <button type="submit" class="btn btn-primary btn-block form-control">S'inscrire</button>
                            </div>
                            <div class="col-12 form-group">
                                <p class="text-center">Déjà un compte ? <a href="../connexion/Connexion.php">Connectez-vous</a></p>
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

