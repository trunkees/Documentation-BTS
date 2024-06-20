<footer class="site-footer" style="background:#1f2642" >
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12 col-12 border-bottom pb-5 mb-5">
                <div class="d-flex">
                    <a href="../../index.php" class="navbar-brand mx-auto mx-lg-0">
                        <img src="../../images/SkillMate_Logo.png">
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
                        <li class="footer-menu-item"><a href="../../index.php#histoire" class="footer-menu-link">Notre histoire</a></li>

                        <li class="footer-menu-item"><a href="../../View/inscription/Inscription.php" class="footer-menu-link">Inscription</a></li>

                        <li class="footer-menu-item"><a href="../../View/connexion/Connexion.php" class="footer-menu-link">Connexion</a></li>

                        <li class="footer-menu-item"><a href="../../View/projet/Projets.php" class="footer-menu-link">Projets</a></li>

                    <?php
                        if (isset($_SESSION['is_logged']) === false) {
                            
                        } else {
                            echo '<li class="footer-menu-item"><a href="../../View/signalement/signalement.php" class="footer-menu-link">Signalement</a></li>';
                        }
                    ?>
                    </ul>
                </div>  
            </div>

        </div>
    </div>
</footer>
