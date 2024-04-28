
<?php include RACINE . '/view/header.php'; ?>
<main>
<div id="band">
    </div>

    <!-- Formulaire de connexion -->
<form action="?action=connection" class="form-container" method="post">
    <h1>Connexion</h1>

    <label for="email">Email de connexion:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>

    <button class="button" type="submit">Se connecter</button>
</form>
</main>
<?php include RACINE . '/view/viewCookie.php' ?>
<?php include RACINE . '/view/footer.php'; ?>