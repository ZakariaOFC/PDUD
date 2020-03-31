<?php
    if (isset($_SESSION['administrateur']) AND $_SESSION['administrateur'] == TRUE ) {

        $reqUtilisateur = "SELECT * FROM utilisateur WHERE id > 1";
        $reqUtilisateur = $bdd -> prepare($reqUtilisateur);
        $reqUtilisateur -> execute();

    }else{
        echo 'Vous n\'avez pas accès à cette page !';
        echo '<script> window.location="index.php?page=1"</script>';
    }
?>

<div class="container-fluid" style="margin-top: 120px;">
    <div class="container my-5">
        <section>
            <h3 class="font-weight-bold text-center dark-grey-text pb-2">CRÉATION - MODÉRATION - STATISTIQUE</h3>
            <hr class="w-header my-4">
            <p class="lead text-center text-muted pt-2 mb-5">ADMINISTRATION PDUD-AUMETZ</p>
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card text-center bg-warning text-white">
                        <div class="card-body">
                            <p class="mt-4 pt-2"><a class="text-white" href="#"><i
                                        class="fas fa-users-cog fa-4x"></i></a></p>
                            <h5 class="font-weight-normal my-4 py-2">Modération</h5>
                            <p class="mb-4">Modération des utlisateurs. Ajouts, suppressions & droits administrateurs.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card text-center bg-success text-white">
                        <div class="card-body">
                            <p class="mt-4 pt-2"><a class="text-white" href="#"><i
                                        class="fas fa-book-open fa-4x"></i></a></p>
                            <h5 class="font-weight-normal my-4 py-2">Créations</h5>
                            <p class="mb-4">Création de contenu sur le site. Ajout d'articles/modification en fonction
                                des thèmes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card text-center bg-primary text-white">
                        <div class="card-body">
                            <p class="mt-4 pt-2"><a class="text-white" href="#"><i
                                        class="fas fa-calendar-check fa-4x"></i></a></p>
                            <h5 class="font-weight-normal my-4 py-2">Évènements</h5>
                            <p class="mb-4">Création d'évènements. Publication d'évènements sur le calendrier du site.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card text-center bg-danger text-white">
                        <div class="card-body">
                            <p class="mt-4 pt-2"><a class="text-white" href="#"><i
                                        class="fas fa-chart-line fa-4x"></i></a></p>
                            <h5 class="font-weight-normal my-4 py-2">Statistiques</h5>
                            <p class="mb-4">Récapitulatif des données. Visualisation des flux, suivi de l'évolution du
                                site.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<br>
<hr class="w-header my-4">
<br>

<div class="container my-5">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card card-list">
                    <div class="card-header white d-flex justify-content-between align-items-center py-3 bg-warning">
                        <p class="h5-responsive font-weight-bold mb-0 text-white">Modération des utilisateurs</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">N°de compte</th>
                                    <th scope="col">Identifiant</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col" style="text-align:center;">Droits</th>
                                    <th scope="col" style="text-align:center;">Modification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($donnee = $reqUtilisateur -> fetch()){ echo'
                                <tr id="line-'.$donnee['id'].'">
                                    <th scope="row"><a class="text-primary">' .$donnee['id']. '</th>
                                    <td>' .strtoupper($donnee['identifiant']). '</td>
                                    <td>' .strtoupper($donnee['nom']). ' - ' .strtoupper($donnee['prenom']). '</td>
                                    <td>' .strtoupper($donnee['date_creation']). '</td>
                                    <td style="text-align:center;"> <span id="etat-'.$donnee['id'].'">' .$donnee['etat']. '</span></td>
                                    <td style="text-align:center;"><button type="button" class="btn btn-warning" onclick="setAdmin('.$donnee['id'].')"><i class="fas fa-chevron-up"></i></button> 
                                    <button type="button" class="btn btn-success" onclick="setUser('.$donnee['id'].')"><i class="fas fa-chevron-down"></i></button> 
                                    <button type="button" class="btn btn-danger" onclick="delUser('.$donnee['id'].')"><i class="fas fa-ban"></i></button></td>
                                </tr>
                                ';}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<br>
<hr class="w-header my-4">
<br>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="container my-5">
            <section>
                <div class="card card-list">
                    <div class="card-header white d-flex justify-content-between align-items-center py-3 bg-success ">
                        <p class="h5-responsive font-weight-bold mb-0 text-white">Rédaction d'articles</p>
                    </div>
                    <div class="card-body">
                                    
                        <FORM action="#" method="POST">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="theme">Thèmes</label>
                                </div>
                                <select class="custom-select" id="theme" name="theme">
                                    <?php $listeTheme = $bdd->query ('SELECT * FROM theme ORDER BY id ASC');
                                        while ($liste_Theme = $listeTheme ->fetch()) { 
                                        echo '<option value="'.$liste_Theme['titre'].'">'.$liste_Theme['titre'].'</option>';
                                    }?>
                                </select>
                            </div>

                            <div class="input-group">
                                <span class="input-group-text">Titre</span>
                                <input type="text" class="form-control" id="titre" name="titre">
                            </div>

                            <br>

                            <textarea id="contenu" name="contenu">Votre article ici !</textarea>

                            <br>
                            <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Image 1 :</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="file" id="image_01" name="image_01">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Image 2 :</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="file" id="image_02" name="image_02">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Image 3 :</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="file" id="image_03" name="image_03">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Image 4 :</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="file" id="image_04" name="image_04">
                                </div>
                            </div>

                            <br>

                            <div class="input-group">
                                <span class="input-group-text">IFrame</span>
                                <input type="text" class="form-control" id="video" name="video">
                            </div>

                            <br>

                            <div class="input-group">
                                <span class="input-group-text">Rédacteur *</span>
                                <input type="text" class="form-control" id="redacteur" name="redacteur">
                            </div>

                            <br>

                            <div class="card-footer py-3">
                                <div class="text-center">
                                    <button class="btn btn-primary btn-md px-3 my-0 mr-0">Publier</button>
                                </div>
                            </div>

                        </FORM>
                    </div>
                </section>
            </div>
        <div class="col-md-3"></div>
    </div>
</div>

<br>
<hr class="w-header my-4">
<br>

<?php $datetime = date("Y-m-d"); ?>

<div class="container my-5">
    <section>
        <div class="row">
            <div class="col-12">

                <div class="card card-list">
                    <div class="card-header white d-flex justify-content-between align-items-center py-3 bg-primary">
                        <p class="h5-responsive font-weight-bold mb-0 text-white">Évènements</p>
                    </div>

                    <div class="card-body">

                    <FORM action="#" method="POST">
                        <div class="input-group">
                            <span class="input-group-text">Nom de l'évènement</span>
                            <input type="text" class="form-control" id="nom_event" name="nom_event" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text" style="width:176px">Date</span>
                            <input class="form-control" type="date" value="<?php echo $datetime ?>" id="date_event" name="date_event" required>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text" style="width:176px">Heure de début</span>
                            <input class="form-control" type="time" value="" id="start_event" name="start_event" require>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text" style="width:176px">Heure de fin</span>
                            <input class="form-control" type="time" value="" id="end_event" name="end_event" require>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text" style="width:176px">Couleur</span>
                            <input class="form-control" id="color-picker" name="color_event" value='#276cb8' style="width:100%">
                        </div>
                        <br>
                        <div class="card-footer py-3">
                            <div class="text-center">
                                <button class="btn btn-primary btn-md px-3 my-0 mr-0">Publier</button>
                            </div>
                        </div>
                    </FORM>
                </div>
            </div>
        </div>
    </section>
</div>

<br>
<hr class="w-header my-4">
<br>

<!-- AFFICHAGE DES STATISTIQUES -->
<?php
    $req_user = 'SELECT COUNT(*) FROM utilisateur';
    $req_user = $bdd -> prepare($req_user);
    $req_user -> execute();
    $nbUtilisateur = $req_user -> fetch();

    $req_newsletter = 'SELECT COUNT(*) FROM newsletter';
    $req_newsletter = $bdd -> prepare($req_newsletter);
    $req_newsletter -> execute();
    $nbNewsletter = $req_newsletter -> fetch();
    
    $req_article = 'SELECT COUNT(*) FROM article';
    $req_article = $bdd -> prepare($req_article);
    $req_article -> execute();
    $nbArticle = $req_article -> fetch();
?>

<div class="container my-5">
    <section>
        <div class="row">
            <div class="col-12">

                <div class="card card-list">
                    <div class="card-header white d-flex justify-content-between align-items-center py-3 bg-danger">
                        <p class="h5-responsive font-weight-bold mb-0 text-white">Statistique</p>
                    </div>
                    <div class="card-body">
                    <h3 class="text-center font-weight-bold mb-5">Informations sur l'activité du site</h3>

                    <div class="row d-flex justify-content-center">

                    <div class="col-md-6 col-lg-3 mb-4 text-center">
                        <h4 class="h1 font-weight-normal mb-3">
                            <i class="fas fa-users"></i>
                            <span class="d-inline-block count-up"><?php echo $nbUtilisateur[0] ?></span>
                        </h4>
                        <p class="font-weight-normal text-muted">Inscrits</p>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4 text-center">
                        <h4 class="h1 font-weight-normal mb-3">
                            <i class="fas fa-paper-plane"></i>
                            <span class="d-inline-block count1"><?php echo $nbNewsletter[0] ?></span>
                        </h4>
                        <p class="font-weight-normal text-muted">Abonnées à la newsletter</p>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4 text-center">
                        <h4 class="h1 font-weight-normal mb-3">
                            <i class="fas fa-align-right"></i>
                            <span class="d-inline-block count2"><?php echo $nbArticle[0] ?></span>
                        </h4>
                        <p class="font-weight-normal text-muted">Articles</p>
                    </div>
                    
                    <div class="col-md-6 col-lg-3 mb-4 text-center">
                        <h4 class="h1 font-weight-normal mb-3">
                            <i class="fas fa-rocket"></i>
                            <span class="d-inline-block count3"></span>
                        </h4>
                        <p class="font-weight-normal text-muted">Projets</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<!-- TRAITEMENT DES "EVENEMENTS" -->
<?php
    if(isset(

    $_POST['nom_event'],
    $_POST['date_event'],
    $_POST['start_event'],
    $_POST['end_event'],
    $_POST['color_event']) 

    && $_POST['nom_event'] != NULL
    && $_POST['date_event'] != NULL 
    && $_POST['start_event'] != NULL 
    && $_POST['end_event'] != NULL
    && $_POST['color_event'] != NULL){

        $NomEvent = $_POST['nom_event'];
        $StartEvent = $_POST['date_event']." ".$_POST['start_event'].":00";
        $EndEvent = $_POST['date_event']." ".$_POST['end_event'].":00";
        $ColorEvent = $_POST['color_event'];

        $addEvent = $bdd -> prepare('INSERT INTO evenements VALUES (NULL, :title, :start, :end, :backgroundColor)');

        $addEvent -> bindValue(':title', $NomEvent);
        $addEvent -> bindValue(':start', $StartEvent);
        $addEvent -> bindValue(':end', $EndEvent);
        $addEvent -> bindValue(':backgroundColor', $ColorEvent);

        $addEvent -> execute();
    }
?>

<!-- TRAITEMENT DE "REDACTION D'ARTICLES" -->

<?php
    if(isset(

    $_POST['theme'],
    $_POST['titre'],
    $_POST['contenu'],
    $_POST['redacteur']) 

    && $_POST['theme'] != NULL
    && $_POST['titre'] != NULL 
    && $_POST['contenu'] != NULL 
    && $_POST['redacteur'] != NULL){

        $theme_article = $_POST['theme'];
        $titre_article = $_POST['titre'];
        $contenu_article = $_POST['contenu'];
        $redacteur_article = $_POST['redacteur'];

        $image_01 = $_POST['image_01'];
        $image_02 = $_POST['image_02'];
        $image_03 = $_POST['image_03'];
        $image_04 = $_POST['image_04'];

        $iframe = $_POST['video'];

        $date_article = date('d-m-Y - H:i');

        $reqArticle = $bdd -> prepare('INSERT INTO article VALUES (NULL,:theme, :titre, :contenu, :image_01, :image_02, :image_03, :image_04, :video, :redacteur, :date)');

        $reqArticle -> bindValue(':theme',strtolower($theme_article));
        $reqArticle -> bindValue(':titre',strtolower($titre_article));
        $reqArticle -> bindValue(':contenu', strtolower($contenu_article));
        $reqArticle -> bindValue(':redacteur', strtolower($redacteur_article));
    
        $reqArticle -> bindValue(':image_01',strtolower($image_01));
        $reqArticle -> bindValue(':image_02',strtolower($image_02));
        $reqArticle -> bindValue(':image_03',strtolower($image_03));
        $reqArticle -> bindValue(':image_04',strtolower($image_04));
        $reqArticle -> bindValue(':video',strtolower($iframe));

        $reqArticle -> bindValue(':date',$date_article);
        $reqArticle -> execute();
    }
?>

<!-- CDN TINYMCE -->

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>

<!-- AJAX BOUTONS "MODERATION UTILISATEURS" -->

<script>
    function setUser(id) {
        console.log(id);
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.status == 200) {
                console.log("UPDATE OK");
                var element = document.getElementById("etat-" + id);
                element.innerHTML = 0 + "<br>" + "<span class='badge badge-success'>Récemment modifié</span>";
            } else {
                console.log("UPDATE NON OK");
            }
        };
        xhttp.open("POST", "ajax/setUser.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
    }

    function setAdmin(id) {
        console.log(id);
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.status == 200) {
                console.log("UPDATE OK");
                var element = document.getElementById("etat-" + id);
                element.innerHTML = 1 + "<br>" + "<span class='badge badge-warning'>Récemment modifié</span>"
            } else {
                console.log("UPDATE NON OK");
            }
        };
        xhttp.open("POST", "ajax/setAdmin.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
    }

    function delUser(id) {
        console.log(id);
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.status == 200) {
                console.log("SUPPRESSION OK");
                document.getElementById("line-" + id).style.display = "none";
            } else {
                console.log("SUPPRESSION NON OK");
            }
        };
        xhttp.open("POST", "ajax/delUser.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
    }
</script>