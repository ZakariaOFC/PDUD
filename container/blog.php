<div class="container">
    <div class="row section-title flex-column">
        <h2>LES NEWS</h2>
        <hr>
        <h4 class="subtitle">Restez informé et regardez nos dernières news !</h4>
    </div>

    <hr>
    <div class="section-inner d-flex mx-0">

            <div id="main-content">

                <?php
                    $req = $bdd->query('SELECT * FROM article ORDER BY id');
                    while ($donnee = $req->fetch()){
                ?>

                <!-- ARTICLE -->
                <div class="blog-entry col-12">

                    <div class="blog-content container-fluid">
                        <div class="blog-headline">
                            <h3 class="post-name"><?php echo $donnee['titre']; ?></h3>
                            <h6 class="post-meta"><?php echo strtoupper($donnee['redacteur']); ?></h6>
                        </div>
                        <?php 
                                    if($donnee['video'] != NULL){
                                        echo '<div class="blog-media iframe">'.$donnee['video'].'</div>'; 
                                    }

                                    if($donnee['image_1'] != NULL AND $donnee['image_2'] == NULL AND $donnee['image_3'] == NULL AND $donnee['image_4'] == NULL){
                                        echo '<img class="image-fluid" src="img/article/'.$donnee['image_1'].'" style="height:624px">';
                                    }

                                    if($donnee['image_1'] != NULL && $donnee['image_2'] != NULL && $donnee['image_3'] == NULL && $donnee['image_4'] == NULL){
                                        echo'
                                            <div id="carouselExampleIndicators-'.$donnee['id'].'" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators-'.$donnee['id'].'" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselExampleIndicators-'.$donnee['id'].'" data-slide-to="1"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block" src="img/article/'.$donnee['image_1'].'" alt="Premier slide" style="height:624px">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block" src="img/article/'.$donnee['image_2'].'" alt="Second slide" style="height:624px">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators-'.$donnee['id'].'" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators-'.$donnee['id'].'" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        ';
                                    }

                                    if($donnee['image_1'] != NULL && $donnee['image_2'] != NULL && $donnee['image_3'] != NULL && $donnee['image_4'] == NULL){
                                        echo'
                                            <div id="carouselExampleIndicators-'.$donnee['id'].'" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators-'.$donnee['id'].'" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselExampleIndicators-'.$donnee['id'].'" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleIndicators-'.$donnee['id'].'" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block" src="img/article/'.$donnee['image_1'].'" alt="Premier slide" style="height:624px">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block" src="img/article/'.$donnee['image_2'].'" alt="Second slide" style="height:624px">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block" src="img/article/'.$donnee['image_3'].'" alt="Third slide" style="height:624px">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators-'.$donnee['id'].'" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators-'.$donnee['id'].'" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        ';
                                    }

                                    if($donnee['image_1'] != NULL && $donnee['image_2'] != NULL && $donnee['image_3'] != NULL && $donnee['image_4'] != NULL){
                                        echo'
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block" src="img/article/'.$donnee['image_1'].'" alt="Premier slide" style="height:624px">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block" src="img/article/'.$donnee['image_2'].'" alt="Second slide" style="height:624px">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block" src="img/article/'.$donnee['image_3'].'" alt="Third slide" style="height:624px">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block" src="img/article/'.$donnee['image_4'].'" alt="Fourth slide" style="height:624px">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        ';
                                    }
                                ?>
                        <p class="blog-intro"><?php echo $donnee['contenu']; ?></p>
                        <p class="blog-intro">Publié le <?php echo $donnee['date']; ?></p>

                    </div>
                </div>

                <?php
                    } $req->closeCursor(); 
                ?>
            </div>
        </div>

        <!-- SIDEBAR -->
        <!-- <aside id="sidebar" class="col-md-4">

            <div class="search">
                <form class="search" method="get">
                    <input name="search" id="search" type="text" value="" placeholder="Search">
                </form>
            </div>

            <div class="text">
                <h6 class="title">A Propos du Blog</h6>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum.</p>
            </div>

            <div class="category">
                <h6 class="title">Categories</h6>
                <ul>
                    <li><a href="#">Video</a> (3)</li>
                    <li><a href="#">Gallery</a> (9)</li>
                </ul>
            </div>

            <div class="recentpost">
                <h6 class="title">Derniers Articles</h6>
                <ul>
                    <li><a href="#">Giza Lagarce</a></li>
                    <li><a href="#">Day of Photography</a></li>
                    <li><a href="#">Web design Trends 2014</a></li>
                </ul>
            </div>

        </aside> -->
        <!-- SIDEBAR -->
    </div>
    <hr>
</div>