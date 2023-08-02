?>


















&nbsp;
<div class="homePage">
    <header>
        <h1 class="text-center"></h1>
        <!-- Ajoutez ici d'autres éléments de votre header si nécessaire -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <!-- Ajouter d'autres indicateurs ici si vous avez plus de diapositives -->
            </ol>
            <div class="carousel-inner">
                <!-- Diapositive 1 -->
                <div class="carousel-item active">
                    <img src="../../../assets/images/carrousel/homme-devant-pc-ecoutant-podcast.jpg" class="d-block w-100" alt="Image 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-start">Market Place Forum</h1>
                        <p> </p>
                    </div>
                </div>

                <!-- Diapositive 2 -->
                <div class="carousel-item">
                    <img src="../../../assets/images/carrousel/homme-devant-pc-ecoutant-podcast.jpg" class="d-block w-100" alt="Image 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Titre de l'image 2</h3>
                        <p>Description de l'image 2</p>
                    </div>
                </div>

                <!-- Diapositive 3 -->
                <div class="carousel-item">
                    <img src="../../../assets/images/carrousel/istockphoto-1411216577-612x612.jpg" class="d-block w-100" alt="Image 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Titre de l'image 3</h3>
                        <p>Description de l'image 3</p>
                    </div>
                </div>
                <!-- Ajouter d'autres diapositives ici si nécessaire -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </header>

    &nbsp;


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 ">
                <div class="sidebar">
                    <?php
                    include './src/Controllers/SideBarController.php';
                    $sidebarController = new SidebarController();
                    $sidebarController->_home();
                    ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="homeCardLeft card">
                    <h2 class="text-center">Forum</h2>
                    <?php foreach ($posts as $post) : ?>
                        <div class="card">
                            <h3 class="homeCardLeftText"><?php echo $post->getTitle(); ?></h3>
                            <p class="homeCardLeftText"><?php echo 'Publication:  ' . $post->getContent(); ?></p>
                            <p class="homeCardLeftText"><?php echo 'Mise en ligne:  ' . $post->getCreated_at(); ?></p>
                            <p class="homeCardLeftText"> <?php echo 'Par: ' . $userPost->getUsername(); ?></p>
                            <p class="homeCardLeftText"><?php echo '0 j\'aime'; ?></p>
                        </div>
                      <?php if(isset($_SESSION['user'])) { ?>
                        <div class="control-publication">
                            <?php if (isset($_SESSION['user'])) : echo "<a class='postBtn' href=''>Comenter</a>";
                            else : endif; ?>
                            &nbsp;| &nbsp;
                            <?php if (isset($_SESSION['user'])) : echo "<a class='postBtn formBtn' href=''>J'aime</a>";
                            else : endif; ?>
                            &nbsp;| &nbsp;
                            <?php if (isset($_SESSION['user'])) : echo "<a class='postBtn formBtn' href=''>Voir les commentaire (0)</a>";
                            else : endif; ?>
                            &nbsp;
                        </div>
                    <?php }  endforeach ; ?>

                </div>
            </div>
            &nbsp;


            <div class="col-lg-4">
                <div class="homeCardRight card">
                    <h2 class="text-center">Second-hand sales </h2>
                    <?php foreach ($annonces as $annonce) : ?>
                        <div>
                            <div class="container">
                                <h3 class="homeCardLeftText"><?php echo $annonce->getTitle(); ?></h3>
                                <p class="homeCardLeftText"><?php echo $annonce->getDescription(); ?></p>
                                <p class="homeCardLeftText"><?php echo 'Prix: ' . $annonce->getPrice(); ?></p>
                                <p class="homeCardLeftText"><?php echo 'Mise en ligne: ' . $annonce->getCreated_at(); ?></p>
                                <p class="homeCardLeftText"> <?php echo 'Par: ' . $userAnnonce->getUsername() ?></p>
                                <?php if (isset($_SESSION['user'])) : echo "<button class='formBtn'>Contacter le vendeur</button>";
                                else : endif; ?>
                            </div>
                        </div>
                        <hr class="homeAnnonceSeparator">
                        &nbsp;
                    <?php endforeach; ?>
                    <a href="#boutique">Explorer la boutique</a>
                </div>
            </div>

        </div>
    </div>
</div>