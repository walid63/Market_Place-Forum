




<div class="adminDoor">
    <div class="container">
        <h1 class="text-center">
            Admin Verification
            
        </h1>

        <div class="container">
            <div class="AdminDoorControl">
            <?php
                // Vérifiez si la clé générée existe dans la variable $generatedKey
                if (isset($generatedKey)) {
                    // Échapper la clé pour inclure dans l'URL
                    $escapedKey = htmlspecialchars($generatedKey);
                    // Créer le lien vers la route avec la clé incluse en tant que paramètre
                    $link = "/admin/$escapedKey";
                    // Afficher le lien
                    echo "<a href=$link>Accéder à l'administration</a>";
                }
                ?>
            </div>
        </div>
        
    </div>
</div>