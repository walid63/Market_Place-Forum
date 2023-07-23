
<div class="sidebar">
    <?php if ($isLoggedIn == true): ?>
        <!-- Contenu à afficher si l'utilisateur est connecté -->
       
         <h3>Bienvenue, utilisateur connecté !</h3>
        <p>Contenu spécifique pour les utilisateurs connectés.</p>
    <?php else: ?>
        <!-- Contenu à afficher si l'utilisateur n'est pas connecté -->
        <div class="container-fluid">
        <h3>Connectez-vous</h3>
        
        </div>

        <ul class="list-group">
        <li class="list-group-item">Communication</li>
  <li class="list-group-item"><i class="fa-solid fa-newspaper"></i>&nbsp;Annonce</li>
  <li class="list-group-item"><i class="fa-solid fa-pencil"></i>&nbsp;Publications</li>

  <li class="list-group-item">etc ...</li>
</ul>
&nbsp;

<ul class="list-group">
       
  <li class="list-group-item">Categories</li>
  <li class="list-group-item">Vacances</li>
  <li class="list-group-item">Maison</li>
  <li class="list-group-item">etc ...</li>

</ul>
    <?php endif; ?>
     
</div>
