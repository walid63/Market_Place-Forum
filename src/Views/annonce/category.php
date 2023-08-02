<h1 class="text-center"> Annonce Category</h1>


<?php





?>



<div class="container">
    <?php
    if ($annonces) {
        foreach ($annonces as $annonce) :  ?>
            <div class="card text-center">
                <p><?= $annonce->getTitle() ?></p>
                <p><?= $annonce->getDescription() ?></p>
                <p><?= $annonce->getPrice() ?></p>
            </div>
        <?php endforeach ?>
    <?php } else {

        echo "Aucune Annonce de cette categorie n'a été trouvé";
    } ?>

</div>