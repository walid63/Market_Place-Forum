<h1 class="text-center">Market Place Actualité</h1>






<div class="annonceActuality text-light">
   
<?php
// <h6><?php print_r($val->getDescription()) </h6>

foreach ($annonces as $annonce => $val) { ?>

   <div class="container">
      <div class=" ">
        <div class="container">
        <p>Titre:<?= $val->getTitle() ?></p>
         <p>Description:<?= $val->getDescription() ?></p>
         <p>Prix: <?= $val->getPrice() ?></p>
         <hr class="text-light">
         <p>Mis en ligne par: <?= $userAnnonce->getUsername();?></p>

         <a href="index.php?id=annonce/detail&id=<?php echo $val->getId(); ?>">Voir les détails</a>
        </div>

      </div>
   </div>
   &nbsp;

<?php } ?>
</div>