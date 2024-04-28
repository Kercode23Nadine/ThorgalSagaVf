<?php include RACINE . '/view/header.php' ?>

<main id="form-container">
    <div id="band"> </div>
  
    <?php foreach ($authors as $author) : ?>
        <div class="article">
            <div class="author-info">
                <?php if (isset($author['first_name']) && isset($author['name'])) : ?>
                    <h1 class="author-name"><?php echo $author['first_name'] . ' ' . $author['name']; ?></h1>
                <?php endif; ?>

                <?php if (isset($author['picture'])) : ?>
                    <img src="<?php echo $author['picture']; ?>" alt="Photo de l'auteur" class="author-image">
                <?php endif; ?>

                <?php if (isset($author['fonction'])) : ?>
                    <p class="author-bio"><?php echo $author['fonction']; ?></p>
                <?php endif; ?>
                <?php if (isset($author['biography'])) : ?>
                    <p class="author-bio"><?php echo $author['biography']; ?></p>
                <?php endif; ?>
            </div> <?php if (isset($_SESSION['TROLL

            ']) && $_SESSION['TROLL']) : ?>

                <!-- Bouton de suppression (visible uniquement pour les administrateurs) -->
                <form action="?action=authors" method="post">
                    <input type="hidden" name="id_author" value="<?php echo $author['id_author']; ?>">
                    <button class="button" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet auteur?')">Supprimer</button>
                </form>

            <?php endif; ?>
        </div>

    <?php endforeach; ?>
</main>
<?php include RACINE . '/view/footer.php' ?>