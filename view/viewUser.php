<?php include RACINE . '/view/header.php'; ?>
<main>

    <div id="band"></div>
    <!-- Formulaire de profil -->
    <form class="form-container" action="?action=user" method="POST" enctype="multipart/form-data">
        <h1>Profil</h1>
        <p><label for="avatar">Avatar :</label></p>
        <p><input type="file" id="avatar" name="avatar"></p>

        <label for="username">Pseudo :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="first-name">Prénom :</label>
        <input type="text" id="first-name" name="first_name" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <button class="button" type="submit" name="save">Enregistrer</button>
    </form>

    <form class="form-container" action="?action=user" method="POST" enctype="multipart/form-data">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>
        <button class="button" type="submit" name="delete">Supprimer votre compte</button>
    </form>
</main>
<?php include RACINE . '/view/footer.php'; ?>