<?php
  if(isset($_POST['identifiant_utilisateur'], $_POST['motdepasse_utilisateur']) && $_POST['identifiant_utilisateur'] != NULL && $_POST['motdepasse_utilisateur'] != NULL) {

    $identifiant_utilisateur = $_POST['identifiant_utilisateur'];
    $motdepasse_utilisateur = $_POST['motdepasse_utilisateur'];

    $rechercheCompteUtilisateur = "SELECT * FROM utilisateur WHERE identifiant = '$identifiant_utilisateur' ";
    $rechercheCompteUtilisateur = $bdd->prepare($rechercheCompteUtilisateur);
    $rechercheCompteUtilisateur->execute();

    while($donnee = $rechercheCompteUtilisateur -> fetch()){
      $id = $donnee['identifiant'];
      $hash = $donnee['mdp'];
      $etat = $donnee['etat'];
    }

    if(isset($hash,$id,$etat)){
      if(password_verify($motdepasse_utilisateur, $hash) AND $etat != 0){
        $_SESSION['NomUtilisateur'] = $_POST['identifiant_utilisateur'];
        $_SESSION['administrateur'] = true;
        $_SESSION['utilisateur'] = false;
        echo '<script> window.location="index.php?page=administration"</script>';
      }else{
        $_SESSION['NomUtilisateur'] = $_POST['identifiant_utilisateur'];
        $_SESSION['administrateur'] = false;
        $_SESSION['utilisateur'] = true;
        echo '<script> window.location="index.php?page=1"</script>';
      }
    }else{
      echo'<script>alert("Ce compte n\'existe pas !")</script>';
    }
  }
?>

<!-- FORMULAIRE DE CONNEXION A LA BASE DE DONNEES -->

<div class="container-fluid" style="margin-top:180px; margin-bottom:250px;">
  <div class="row">
      <div class="col-5">
      </div>
      <div class="col-2">
        <FORM method="POST" action="">
          <h3><i class="fas fa-chevron-circle-down"></i> Connectez vous !</h3>
          <br>
            <label></i>Identifiant</label>
            <input type="text" class="form-control" id="identifiant_utilisateur" name="identifiant_utilisateur" placeholder="">
          <br><br>
            <label>Mot de passe</label>
            <input type="password" class="form-control" id="motdepasse_utilisateur" name="motdepasse_utilisateur" placeholder="">
          <br>
          <button type="submit" class="btn btn-success" href="index.php?page=1">Connexion</button> 
          <p> Pas encore inscrit ? - <a href="index.php?page=inscription">S'inscrire !</a></p>
        </FORM>
      </div>
      <div class="col-5">
      </div>
  </div>
</div>