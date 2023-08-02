<div class="editProfile">
    <h2 class="text-center">Modifier mon profile</h2>
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card cardUser mb-4 mb-xl-0">
                <div class="card-header">Profile de <?=  $user['username']; ?></div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="globalBtn btn btn-primary" id="uploadBtn" type="button">Upload new image</button>
                    <div class="bg-dark" id="blockButton"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card accountDetailCard mb-4">
                <div class="card-header">Détails du compte</div>
                <div class="card-body">
                    <form method="post">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (comment votre nom apparaîtra aux autres utilisateurs sur le site) </label>
                            <input class="form-control" id="inputUsername" name="username" type="text" placeholder="Enter your username" value="<?= $user['username']?>">

                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" name="firstname" type="text" placeholder="Enter your first name" value="<?= $user['firstname']?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" name="lastname" type="text" placeholder="Enter your last name" value="<?= $user['lastname']?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="address">Adresse</label>
                                <input class="form-control" id="inputAddress" name="address" type="text" placeholder="Enter your organization name" value="<?= $user['address']?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">ville</label>
                                <input class="form-control" id="inputCity" name="city" type="text" placeholder="Enter your location" value="<?= $user['city']?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">email</label>
                                <input class="form-control" id="inputCity" name="email" type="text" placeholder="Enter your location" value="<?= $user['email']?>">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-6">
                            <label class="small mb-1" for="inputEmailAddress">birday</label>
                            <input class="form-control" id="inputEmail" name="birthday" type="text" placeholder="Enter your email address" value="06/04/1995">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" name="tel" type="tel" placeholder="Enter your phone number" value="<?= $user['tel']?>">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">code postal</label>
                                <input class="form-control" id="inputBirthday" type="text" name="zipcode" placeholder="Enter your birthday" value="<?= $user['zip_code']?>">
                            </div>
                           
                        </div>
                        <!-- Save changes button-->
                        <button class="globalBtn btn btn-primary" name="submit" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    let btn = document.getElementById('uploadBtn');
    let block = document.getElementById('blockButton');

    btn.addEventListener('click', function(e) {
        let uploadBtnChild = document.createElement('input');

         if (!uploadBtnChild) {
        uploadBtnChild = document.createElement('input');
        uploadBtnChild.classList.add('btn-upload');
        uploadBtnChild.setAttribute('type', 'file');
        block.appendChild(uploadBtnChild);
      }
      e.preventDefault();

      /*  uploadBtnChild.classList.add('btn-upload');
        uploadBtnChild.setAttribute('type', 'file');
        e.preventDefault();
        block.appendChild(uploadBtnChild);*/
    });
</script>