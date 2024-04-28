<?php include RACINE . '/view/header.php'; ?>
<main>
    <div id="band">
    </div>
    <article class="form-container">
        <?php
        if (isset($_SESSION['email'])) {
            $user = getUserByEmail($_SESSION['email']);
            if ($user['role'] == 'Admin') {
                echo "<h1>Profil de l'administrateur</h1>";
                echo "<p><strong>Nom d'utilisateur :</strong> " . $user['username'] . "</p>";
                echo "<p><strong>Email :</strong> " . $user['email'] . "</p>";

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

    <!-- Formulaire d'ajout d'album -->
    <form class="form-container" action="?action=albums" method="POST" enctype="multipart/form-data">
        <h1>Ajouter un Album</h1><br>
        <label for="id_album">N° tome :</label><br>
        <input type="text" id="id_album" name="id_album" required><br><br>

        <label for="title">Titre de l'album :</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="dateL">Date de publication :</label><br>
        <input type="date" id="dateL" name="dateL" required><br><br>

        <label for="content">Auteur et Résumé :</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>

        <label for="image">Image de l'album :</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <input type="hidden" name="add_album" value="1"> <!-- Champ caché pour indiquer que le formulaire est soumis -->

        <button class="button" type="submit">Ajouter l'album</button>
    </form>


    <!-- Formulaire d'ajout d'auteur -->
    <form class="form-container" action="?action=authors" method="POST" enctype="multipart/form-data">
        <h1>Ajouter un auteur</h1>
        <label for="picture">Image de l'auteur :</label>
        <input type="file" name="picture" id="picture">
        <label for="fonction">Fonction:</label><br>
        <input type="text" id="fonction" name="fonction"><br>

        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="first_name">Prénom:</label><br>
        <input type="text" id="first_name" name="first_name"><br><br>
        <label for="biography">Biographie:</label><br>
        <textarea id="biography" name="biography"></textarea><br><br>

        <button class="button" type="submit">Ajouter l'auteur</button>
    </form>
    <!-- suppression utilisateur  -->
    <form class="form-container" action="?action=TROLL" method="POST" enctype="multipart/form-data">
        <label for="username">Pseudo :</label>
        <input type="text" id="username" name="username" required><br><br>
        <button class="button" type="submit" name="delete">Supprimer un compte utilisateur</button>
    </form>

</main>
<?php include RACINE . '/view/footer.php'; ?>