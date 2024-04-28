<?php include RACINE . '/view/header.php'; ?>
<main>
    <div id="band"></div>

    <article class="form-container">
        <?php
        // Vérifie si l'utilisateur est connecté.
        if (isset($_SESSION['email'])) {
            // Récupére les informations de l'utilisateur.
            $user = getUserByEmail($_SESSION['email']);
            // Vérifie le rôle de l'utilisateur.
            if ($user['role'] == 'admin') {
                echo "<h1>Profil de l'administrateur</h1>";
                echo "<p><strong>Nom d'utilisateur :</strong> " . $user['username'] . "</p>";
                echo "<p><strong>Email :</strong> " . $user['email'] . "</p>";
                // Vérifie si l'avatar existe avant de l'afficher
                if (isset($user['avatar'])) {
                    echo "<img src='" . $user['avatar'] . "' alt='Avatar de l\'administrateur' style='width: 100px; height: auto;'>";
                } else {
                    echo "Aucun avatar disponible";
                }
            } else {
                echo "<h1>Profil de l'utilisateur</h1>";
                if (isset($user['picture'])) {
                    echo "<img src='" . $user['picture'] . "' alt='Votre avatar' style='width: 100px; height: auto;'>";
                } else {
                    echo "Aucun avatar disponible";
                }
                echo "<p><strong>Nom d'utilisateur :</strong> " . $user['username'] . "</p>";
                echo "<p><strong>Email :</strong> " . $user['email'] . "</p>";
            }
        } else {
            echo "<p>Vous devez être connecté pour afficher votre profil.</p>";
        }
        ?>
    </article>


    <!-- Formulaire pour mettre à jour le profil -->
    <form class="form-container" action="?action=profil" method="POST" enctype="multipart/form-data">
        <h1>Profil</h1>
        <p><label for="avatar">Avatar :</label></p>
        <input type="file" id="avatar" name="avatar" accept="image/*">

        <label for="username">Pseudo :</label>
        <input type="text" id="username" name="username" required value="<?php echo isset($user['username']) ? htmlspecialchars($user['username']) : ''; ?>"><br><br>

        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required value="<?php echo isset($user['name']) ? htmlspecialchars($user['name']) : ''; ?>"><br><br>

        <label for="first-name">Prénom :</label>
        <input type="text" id="first-name" name="first_name" required value="<?php echo isset($user['first_name']) ? htmlspecialchars($user['first_name']) : ''; ?>"><br><br>

        <button class="button" type="submit" name="save">Enregistrer</button>
    </form>

    <!-- Formulaire pour supprimer le compte -->
    <div class="form-container" action="?action=profil" method="POST">

        <a class="button" href="?action=profil&destroy=1">Supprimer votre compte</a>
    </div>
</main>
<?php include RACINE . '/view/footer.php'; ?>