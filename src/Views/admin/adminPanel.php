<h1 class="text-center">Informations de l'administrateur :</h1>




<div class="container-fluid">
    <div class="adminPanel">
        <div class="row">
            <div class="col-lg-3">
                <?php include './src/Views/admin/sideBar/defaultSideBar.php'; ?>
            </div>
            <div class="col-lg-9">
                <?php

                // Vérifier si les informations de l'administrateur sont présentes dans $_SESSION['user']['admin']
                dump($isAdminAdded);
                if (isset($_SESSION['user']['admin'])) {
                    $adminData = $_SESSION['user']['admin']; ?>

                    <div class=" adminPanelFirstCard ">
                        <div class="card-header">head card</div>
                        <div class="card-body">
                            <?php
                            // Afficher les informations de l'administrateur
                           /* echo '<p>ID de l\'administrateur : ' . $adminData['id'] . '</p>';
                            echo '<p>Date d\'inscription : ' . $adminData['date_inscription'] . '</p>';
                            echo '<p>Statut : ' . $adminData['statut'] . '</p>';
                            echo '<p>Dernière connexion : ' . $adminData['derniere_connexion'] . '</p>';*/ ?>
                            <p>Username de lAdmin: <?php dump($userData['username'])?></p>
                            <p>Date d'Inscription en temp qu'Admin: <?php dump($adminData['date_inscription']) ?></p>
                            <p>Dernière connexion : <?php dump($adminData['derniere_connexion']) ?></p>
                            
                        </div>
                    </div>

                <?php  } else {
                    // Aucune information d'administrateur trouvée dans la session
                    echo "Aucune information d'administrateur trouvée.";
                }
                ?>
            </div>
        </div>
    </div>

</div>