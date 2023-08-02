 <?php if (isset($error)) { ?>

  &nbsp;
   <div class="blockErrorForms container bg-danger">
     <?= $error ?>
   </div>

 <?php } ?>

 <div class="row">
   <div class="col-lg-6">
     <div class="form-container">
       <form method="post" class="neon-form">
         <h1 class="login-title">Connexion</h1>
         <div class="form-group">
           <input type="text" id="username" name="email" placeholder="E-mail" required>
         </div>
         <div class="form-group">
           <input type="password" id="password" name="password" placeholder="Mot de passe" required>
         </div>
         <button class="formBtn" name="submit" type="submit">Se connecter</button>
         <a class="btn" href="/register">Cree un compte</a>
       </form>
     </div>
   </div>
   <div class="col-lg-6">
     <div class="container">
       <img class="loginBackground " src="../../../assets/images/background/pablo-gentile-3MYvgsH1uK0-unsplash.jpg" alt="">
     </div>
   </div><?php if (isset($_SESSION['user'])) { ?>
     <script>
      document.location.href="/"
     </script>
   <?php } ?>

   <script src="./../../../assets/scripts/login.js"></script>