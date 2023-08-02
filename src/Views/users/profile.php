<div class="profilePage">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
        <div class="card-profile border-0 shadow">
          <img class="rounded-circle" src="https://www.bootdey.com/img/Content/avatar/avatar6.png" alt="...">
          <div class="card-body p-1-9 p-xl-5">

            <div class="mb-4">

              <h3 class="h4 mb-0"><?= $user['username'] ?></h3>
              <span class="text-primary"><?php  if($countUAnnonce <= 1 ) { echo $countUAnnonce." Article en vente "; } if($countUAnnonce >= 2 ){ echo $countUAnnonce." Articles en ventes "; }?></span>
            </div>
            <ul class="list-unstyled mb-4">
              <li class="mb-3"><a class="text-light" href="#!"><i class="far fa-envelope display-25 me-3 text-secondary"></i><?= $user['email'] ?></a></li>
              <li class="mb-3"><a class="text-light href="#!"><i class="fas fa-mobile-alt display-25 me-3 text-secondary"></i><?= $user['tel'] ?></a></li>
              <li><a class="text-light href="#!"><i class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i><?= $user['address'] ?></a></li>
            </ul>
          </div>
        </div>
      </div>



      <div class="col-md-8">
        <div class="userDetails card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $user['firstname'] . " " . $user['lastname'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $user['email'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $user['tel'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $user['tel'] ?>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $user['address'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <a class="globalBtn btn btn-info " target="__blank" href="/profile/edit">Edit</a>
              </div>
            </div>
          </div>
        </div>
       <div class="row">
          <div class="profileBoxPostCreate card text-center">
            &nbsp;
            <form method="post">
              <textarea placeholder="Exprime Toi !" name="" id="" cols="100" rows="5"></textarea>
               
                <button class="globalBtn" type="submit">Publier</button>   
            </form>
            &nbsp;    
        </div>
        &nbsp;
        
          <div class="profileBoxUserAnnonce ">
           <h3 class="text-center">Mes annonces</h3>
          </div>
        
       </div>
      </div>
    </div>
  </div>










  <script src="../../Utils/js/_profile.js"></script>