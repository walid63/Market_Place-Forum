


<?php

if (isset($_SESSION['user']['wallet'])) { ?>


<div class="container-fluid">
    <div class="walletHome">
        <?= $globalTitle ?>
    </div>
</div>

<?php } else{ ?>
    <div class="container-fluid">
    <div class="walletHome">
        <div class="blockTitle">
        <h1 class="text-center"><?= $globalTitle ?></h1>
        </div>
        &nbsp;
        <div class="container">
            <div class=" blockMain">
                <button class="walletHomeBtn"><a class="walletAlink" href="/wallet/create">Je cree un portefeuille maintenant </a> </button>
                &nbsp;
                <button class="walletHomeBtn"><a class="walletAlink" href="">Non merci plus tard </a></button>
            </div>
        </div>
    </div>
</div>
    <?php } ?>