<?php include '../commun/Header.php'; ?>

        <title>SkillMate</title>
       
    </head>

<body>
    <?php include '../../Controller/Profil/selectAllProfil.php';
        include '../commun/Navbar.php'; ?>

    <?php if(isset($_SESSION['is_logged']) === true) { 

        foreach ($allProfil as $profil) { ?>

            <p>Bienvenue 
                <a href="DetailProfil.php?id=<?php echo $profil['Profile_ID']; ?>">
                    <?php echo $_SESSION['InfoUser']['Pseudo'];?>  
                </a>
            </p>

            
        <?php } }
              
              include "../commun/Footer.php" ?>
</body>
</html>

