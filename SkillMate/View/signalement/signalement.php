<?php include '../commun/Header.php'; ?>

        <title>SkillMate - Signalement</title>

</head>

        <body>
               <?php include "../commun/Navbar.php"; ?>
                <section class="contact section-padding">
                        <div class="container">
                        <div class="row">

                                <div class="col-lg-8 col-12 mx-auto">
                                                <h1>Signalement</h1>
                                                <form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/Signalement/signalement.php" method="POST" role="form" autocomplete="off">             
                                                        
                            <div class="row">

                                        <div class="col-lg-4 col-md-4 col-12">    
                                            <input type="text" name="Feedback" id="feedback" class="form-control" placeholder="Feedback" style="width: 756px;" required="">
                                        </div>

                                <input type="hidden" name="Pseudo" value="<?php echo $_SESSION['InfoUser']['Pseudo']; ?>">
                                <input type="hidden" name="Email" value="<?php echo $_SESSION['InfoUser']['Email']; ?>">
                                <input type="hidden" name="Profile_ID" value="<?php echo $_SESSION['InfoUser']['Profile_ID']; ?>">

                                <input type="hidden" value="ajouter" name="action">
                                <button type="submit" class="form-control">Signaler</button>

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