<?php include RACINE . '/view/header.php' ?>
<div id="band">
</div>
<main class="form-container">

    <h1>Erreur 404</h1>
    <p>Vous êtes perdu, No stress ! Thorgal arrive à la rescousse.</p>
    <img src="asset/images/dessins/D15.jpg" alt="Image de thorgal portant une femme">

    <?php if (!empty($users)) : ?>
        <h2>Liste des utilisateurs</h2>
        <ul>
            <?php foreach ($users as $user) : ?>
                <li><?php echo $user['username']; ?> - <?php echo $user['email']; ?></li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>
</main>

<?php include RACINE . '/view/footer.php' ?>