<?php include '../commun/Header.php'; ?>

        <title>SkillMate - Contact</title>

    </head>
    
    <body>

    <?php include "../commun/Navbar.php"; ?>


    <section class="contact section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form bg-white shadow-lg" action="../../Controller/Contact/Controller_Contact.php" method="post" role="form">
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
        
    <?php include "../commun/Footer.php" ?>

    </body>
</html>
