<?php include RACINE . '/view/header.php' ?>

<main class="container-ca">
    <div id="band">
    </div>
    <section >
        <video  class="video-container" controls="controls">
            <source src="asset/video/Thorgal.mp4" />
            <source src="asset/video/Thorgal.ogv" />
            <source src="asset/video/Thorgal.webm" />
        </video>
    </section>

    <!-- Formulaire pour ajouter un commentaire -->
    <form class="form-container" action="?action=community" method="post">
        <h3>Ajouter un commentaire</h3>
        <textarea name="comment_content" placeholder="Votre commentaire" required></textarea><br>
        <button class="button" type="submit">Envoyer</button>
    </form>


    <!-- Liste des commentaires globaux par utilisateur -->
    <section class="form-container">
        <h2>Commentaires Globaux</h2>
        <ul>
            <?php if (!empty($global_comments)) : ?>
                <?php foreach ($global_comments as $comment) : ?>
                    <li>
                        <p><strong class='rating'>Pseudo :</strong> <?php echo $comment['username']; ?></p>
                        <p><strong class='rating'>Commentaire :</strong> <?php echo $comment['content']; ?></p>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li>Aucun commentaire global disponible.</li>
            <?php endif; ?>
        </ul>
    </section>

</main>

<?php include RACINE . '/view/footer.php' ?>