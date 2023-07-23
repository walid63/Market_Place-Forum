

?>


&nbsp;
<header>
   <h1 class="text-center">home page</h1>
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
                    <img src="../../../assets/images/carrousel/179490466-heureux-homme-asiatique-vérifiant-la-commande-et-préparant-le-produit-pour-le-client-à-la-maison.webp" class="d-block w-100" alt="Image 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Titre de l'image 1</h3>
                        <p>Description de l'image 1</p>
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

        <!-- Le reste du contenu de la page ici -->


</header>

&nbsp;


<div class="container-fluid">
   <div class="row">
      <div class="col-lg-3 ">
         <div class="sidebar">
            <?php
            include './src/Controllers/SideBarController.php';
            $sidebarController = new SidebarController();
            $sidebarController->index();
            ?>
         </div>
      </div>






      <div class="col-lg-4">
         <div class="homeCardLeft card">
            <h2 class="text-center">Forum</h2>
            <ul class="forum-posts">
               <!-- Inclure ici les messages récents ou populaires du forum -->
               <li><a href="#">Message 1 du forum</a></li>
               <li><a href="#">Message 2 du forum</a></li>
               <!-- Ajouter d'autres messages ici -->
            </ul>
            <a href="#forum">Voir plus</a>
         </div>
      </div>
      &nbsp;


      <div class="col-lg-4">
         <div class="homeCardRight card">
            <h2 class="text-center">Second-hand sales site </h2>
            <ul class="boutique-products">
               <!-- Inclure ici les produits en vedette de la boutique -->
               <li><a href="#">Annonce 1</a></li>
               <li><a href="#">Annonce 2</a></li>
               <!-- Ajouter d'autres produits ici -->
            </ul>
            <a href="#boutique">Explorer la boutique</a>
         </div>
      </div>

   </div>
</div>


