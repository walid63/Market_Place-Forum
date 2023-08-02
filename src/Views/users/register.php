 &nbsp;
 <?php


  if (isset($error)) {
    echo '<div class="container alert alert-danger">' . $error . '</div>';
  }



  ?>
 &nbsp;
 <div class="form-container">

   <form method="post" class="neon-form" enctype="multipart/form-data">
     <h1 class="login-title">Inscription</h1>

     <div class="row">
       <div class="form-group col-lg-6">
         <input type="text" id="nom" name="firstname" placeholder="Nom" required>
       </div>
       
       <div class="form-group col-lg-6">
         <input type="text" id="prenom" name="lastname" placeholder="Prénom" required>
       </div>
     </div>


     <div class="form-group">
       <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
     </div>


     <div class="row">
       <div class="form-group col-lg-6">
         <input type="email" id="email" name="email" placeholder="E-mail" required>
       </div>

       <div class="form-group col-lg-6">
         <input type="password" id="password" name="password" placeholder="Mot de passe" required>
       </div>
     </div>


     <div class="form-group">
       <input type="text" id="adresse" name="address" placeholder="Adresse" required>
     </div>



     <div class="row">
     <div class="form-group col-lg-6">
       <input type="text" id="ville" name="city" placeholder="Ville" required>
     </div>
     <div class="form-group col-lg-6">
       <input type="text" id="code_postal" name="zipcode" placeholder="Code postal" required>
     </div>
     </div>

     
     <div class="form-group">
       <input type="tel" id="telephone" name="phone" placeholder="Téléphone" required>
     </div>
     <div class="form-group">
       <input type="file" name="avatar" pbaceholder="blabla" id="">
     </div>
     <button class="formBtn" name="submit" type="submit">S'inscrire</button>
   </form>
 </div>