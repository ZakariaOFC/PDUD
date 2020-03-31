<!-- FORMULAIRE DE INSCRIPTION A LA BASE DE DONNEES -->

<div class="container-fluid" style="margin-top:150px; margin-bottom:250px;">
  <div class="row">

        <div class="col-sm-4 inscription1-col-left">
        </div>

        <div class="col-sm-8">
            <FORM method="POST" action="#">

                <h3><i class="fas fa-chevron-circle-down"></i> Remplissez ce formulaire afin de vous inscrire !</h3>

                <div class="">
                    <label>Adresse Email</label>
                    <input type="email" class="form-control" id="email_utilisateur" name="email_utilisateur" placeholder="">
                </div>
                <br>
                <div class="">
                    <label>Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="identifiant_utilisateur" name="identifiant_utilisateur" placeholder="">
                </div>
                <br>
                <div class="">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" id="motdepasse_utilisateur" name="motdepasse_utilisateur" placeholder="">
                </div>
                <br>
                <div class="">
                    <label>Confirmez votre mot de passe</label>
                    <input type="password" class="form-control" id="motdepasse_utilisateur_confirmation" name="motdepasse_utilisateur_confirmation" placeholder="">
                </div>
                <br>
                <h3><i class="fas fa-chevron-circle-down"></i> Informations personnelles</h3>
                <div class="">
                    <label>Nom</label>
                    <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" placeholder="">
                </div>
                <br>
                <div class="">
                    <label>Prenom</label>
                    <input type="text" class="form-control" id="prenom_utilisateur" name="prenom_utilisateur" placeholder="">
                </div>
                <br>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" name="newsletter">
                      <label class="custom-control-label" for="customCheck1">S'abonnez à la Newsletter (c'est gratuit !)</label>
                    </div>
                <br>
                <button type="submit" class="btn btn-primary">S'inscrire </button>
                <p> Déjà inscrit ? - <a href="index.php?page=connexion">Se connecter</a></p>
            </FORM>
        </div>

        <div class="col-sm-4 inscription1-col-right">
        </div>
    </div>
</div>

<?php

    if(isset(
        $_POST['email_utilisateur'],
        $_POST['identifiant_utilisateur'],
        $_POST['motdepasse_utilisateur'],
        $_POST['motdepasse_utilisateur_confirmation'],
        $_POST['nom_utilisateur'],
        $_POST['prenom_utilisateur'])
 
        AND $_POST['email_utilisateur'] !=NULL
        AND $_POST['identifiant_utilisateur'] !=NULL 
        AND $_POST['motdepasse_utilisateur'] !=NULL
        AND $_POST['motdepasse_utilisateur_confirmation'] !=NULL
        AND $_POST['nom_utilisateur'] !=NULL
        AND $_POST['prenom_utilisateur'] !=NULL
    ){

        $hashMdp = password_hash($_POST['motdepasse_utilisateur'], PASSWORD_BCRYPT);
        $hashMdpConf = password_hash($_POST['motdepasse_utilisateur_confirmation'], PASSWORD_BCRYPT);


        $date_compte = date('d-m-Y - H:i');
        $etat_compte = 0;

        $reqAjoutUtilisateur = $bdd -> prepare('INSERT INTO utilisateur VALUES (NULL, :email, :identifiant, :mdp, :conf_mdp, :nom, :prenom, :etat, :date_creation)');

        $reqAjoutUtilisateur->bindValue(':email', $_POST['email_utilisateur']);
        $reqAjoutUtilisateur->bindValue(':identifiant', $_POST['identifiant_utilisateur']);
        $reqAjoutUtilisateur->bindValue(':mdp', $hashMdp);
        $reqAjoutUtilisateur->bindValue(':conf_mdp', $hashMdpConf);

        $reqAjoutUtilisateur->bindValue(':nom', $_POST['nom_utilisateur']);
        $reqAjoutUtilisateur->bindValue(':prenom', $_POST['prenom_utilisateur']);
        $reqAjoutUtilisateur->bindValue(':etat',$etat_compte);
        $reqAjoutUtilisateur->bindValue(':date_creation',$date_compte);

        $reqAjoutNewsletter = $bdd -> prepare('INSERT INTO newsletter VALUES (NULL, :email)');
        $reqAjoutNewsletter->bindValue(':email', $_POST['email_utilisateur']);
        $reqAjoutNewsletter -> execute();

      if(!empty($_POST)){

            $errors = array();

            if(empty($_POST['identifiant_utilisateur']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['identifiant_utilisateur'])){
              $errors['identifiant_utilisateur'] = 'Attention  Votre nom d\'utilisateur n\'est pas valide !';
              echo '<h2 style="text-align: center;">Attention ! Votre nom d\'utilisateur n\'est pas valide !</h2><br>';
            }

            if(empty($_POST['motdepasse_utilisateur']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['motdepasse_utilisateur']) || $_POST['motdepasse_utilisateur'] != $_POST['motdepasse_utilisateur_confirmation']){
              $errors['motdepasse_utilisateur'] = 'Attention ! Votre mot de passe n\'est pas valide !';
              echo '<h2 style="text-align: center;">Attention ! Votre mot de passe n\'est pas valide !</h2><br>';
            }

            if(empty($_POST['email_utilisateur']) || !preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#',$_POST['email_utilisateur']) || preg_match_all("#hotmail|live|msn#", $_POST['email_utilisateur'],$out)){
              $errors['email_utilisateur'] = 'Attention ! Votre adresse email n\'est pas valide !';
              echo '<h2 style="text-align: center;">Attention ! Votre adresse email n\'est pas valide !</h2><br>';
            }
        }

        if(empty($errors)){

            $reqAjoutUtilisateur -> execute();

            echo '<h2 style="text-align: center;">Votre inscription c\'est déroulé avec succès !</h2><br>';
            echo '<h3 style="text-align: center;">Vous pouvez désormais vous connecter en cliquant <a href="index.php?page=connexion">ici</a></h3><br>';
        }
    }
?>