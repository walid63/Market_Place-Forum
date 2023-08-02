<div class="sidebar">
  <?php if ($isLoggedIn == true) : ?>
    <!-- Contenu à afficher si l'utilisateur est connecté -->

    <h3> &nbsp; <?php print_r($_SESSION['user']['username']) ?></h3>
    <p></p>
    <ul class="list-group">
      <li class="list-group-item">Communication</li>
      <li class="list-group-item"><i class="fa-solid fa-newspaper"></i>&nbsp;Annonce</li>
      <li class="list-group-item"><i class="fa-solid fa-pencil"></i>&nbsp;Publications</li>
      <li class="list-group-item">Portefeuille : 137, 85 €</li>
      
   
      <?php
      foreach ($categories as $category => $categoryName) { ?>
        <a href="/category?id=<?= $categoryName->getId() ?>" class="list-group-item"><?= $categoryName->getName() ?></a>
      <?php } ?>
    </ul>
  <?php else : ?>
    <!-- Contenu à afficher si l'utilisateur n'est pas connecté -->
    <div class="container-fluid">
      <h3 class="text-center">Connectez-vous</h3>
    </div>
    <ul class="list-group">
      <li class="list-group-item">Communication</li>
      <li class="list-group-item"><i class="fa-solid fa-newspaper"></i>&nbsp;Annonce</li>
      <li class="list-group-item"><i class="fa-solid fa-pencil"></i>&nbsp;Publications</li>
    </ul>
    &nbsp;
    <ul class="list-group">
      
      <?php
      foreach ($categories as $category => $categoryName) { ?>
        <li class="list-group-item"><?= $categoryName->getName() ?></li>
      <?php }
      ?>
    </ul>
  <?php endif; ?>

</div>