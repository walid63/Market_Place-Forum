<?php

if (isset($generatedKey)) {
    echo "ok";
}

if (isset($_GET['id'])) {
    echo "ok";
}

?>

<div class="successAddminDoor">
    <?php
    // Récupérer les paramètres 'id' et 'key' depuis l'URL
    $adminId = $_GET['id'];
    $adminKey = $_GET['key'];
    ?>
    <p>ID de l'administrateur : <?php echo $adminId; ?></p>
    <p>Clé d'accès : <?php echo $adminKey; ?></p>
    <p>Copiez et utilisez cette clé pour accéder à l'administration.</p>
</div>