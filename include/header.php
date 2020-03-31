<div id="header" class="d-flex justify-content-between align-items-center flex-wrap-nowrap">
    <a href="index.php" id="id">
        <img  id ="logo" class="img-fluid" src="img/Blason_Aumetz.png" alt="blason d'Aumetz" title="blason d'Aumetz">
        <span id="title">PDUD</span>
    </a>
    <ul id="nav-bar" class="nav d-flex">
        <?php if(isset($_SESSION['administrateur']) AND $_SESSION['administrateur'] == TRUE){?>

            <li class="nav-item"><a class="nav-link" href="index.php?page=administration"><span>ADMINISTRATION</span>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deconnexion"><span>Déconnexion</span></a></li>

        <?php } elseif (isset($_SESSION['utilisateur']) AND $_SESSION['utilisateur'] == TRUE) {?>

            <li class="nav-item"><a class="nav-link" href="index.php?page=administration"><span> <?php echo $_SESSION['NomUtilisateur']; ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deconnexion"><span>Déconnexion</span></a></li>

        <?php } else { ?>

            <li class="nav-item"><a class="nav-link" href="index.php?page=connexion"><span>Connexion</span></a></li>
            
        <?php } ?>

        <?php
            $reqBarnav = 'SELECT * FROM barnav WHERE id > 1';
            $reqBarnav = $bdd->prepare($reqBarnav);
            $reqBarnav->execute();
            while($barnavItem = $reqBarnav-> fetch()){ echo '
                <li class="nav-item"><a class="nav-link" href="index.php?page='.$barnavItem[2].'"><span>'.$barnavItem[1].'</span></a></li>
            ';}
        ?>   
    </ul>
</div>