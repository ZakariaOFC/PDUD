<footer>
    <div class="container">

        <div class="newsletters d-flex justify-content-center" >
            <div class="row">

                <div class="col-sm-6">
                    <div>
                        <h2>Suivez Nous !</h2>
                        <span class="text-white">Inscrivez-vous à notre Newsletter</span> 
                    </div>
                </div>

                <div class="col-sm-6 d-flex align-items-center">
                    <form action="" method="post">
                        <div class="d-flex ">
                            <input name="email" id="email" name="email" placeholder="Entrez votre email" class="form-control mr-4" required="" type="email">
                            <button type="submit" class="btn btn-default">Souscrire</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 d-flex align-items-center flex-column">
                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                </ul>
                <p class="copy">Copyright &copy; 2020 Mairie d'Aumetz - Réalisé par : 
                    <a rel="nofollow noopener" href="#"><em>Zakaria DJEMMAM</em></a>
                    -
                    <a rel="nofollow noopener" href="#"><em>David BROCCOLI</em></a>
                </p>
            </div>
        </div>

    </div>
</footer>


<?php

    if(isset(
        $_POST['email'])
        AND $_POST['email'] !=NULL
    ){
        $reqAjoutNewsletter = $bdd -> prepare('INSERT INTO newsletter VALUES (NULL, :email)');
        $reqAjoutNewsletter -> bindValue(':email', $_POST['email']);
        $reqAjoutNewsletter -> execute();
    }
?>