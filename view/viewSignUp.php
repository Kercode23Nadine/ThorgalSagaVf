<?php include RACINE . '/view/header.php' ?>
<main>
    <div id="band"></div>
    <form action="?action=signUp" class="form-container" method="POST">

        <h1>Inscription</h1>
        <h2>Pour acceder à la communauté</h2>

        <label for="username">Pseudo:</label>
        <input type="text" id="username" name="username" required />

        <label for="email">Email de connexion:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required pattern=".{8,}" title="Le mot de passe doit contenir au moins 8 caractères" />

        <p><input type="checkbox" name="rgpd" id="rgpd" value="rgpd" required>
            <label for="rgpd">
                J'autorise ce site à utiliser mes données personnelles selon notre <a href="?action=ml">politique de Confidentialité</a>
            </label>
        </p>

        <button class="button" type="submit" name="save">S'inscrire</button>

    </form>
</main>



<?php include RACINE . '/view/footer.php' ?>