<?php include RACINE . '/view/header.php'; ?>

<main class="container-ca">
    <div id="band">
    </div>
    <?php $formatted_date = date('d/m/Y', strtotime($albumDetails['dateL'])); ?>

    <article class="article">
        <h2><?php echo ($albumDetails['title']); ?></h2>
        <img class="imgCom" src="<?php echo ($albumDetails['picture']); ?>" alt="Image de l'album">
        <p><b>Synopsis</b> : <br><br> <?php echo ($albumDetails['content']); ?></p>
        <p><b>Publié le</b> : <?php echo $formatted_date; ?></p>

        <!-- Bouton pour afficher la boîte modale -->
        <script>
            const sharedObject = {
                characters: <?php echo $JSONalbumCharacters; ?>,
                index: 0
            };
        </script>
        <?php if (count($albumCharacters) > 0) { ?>
            <button class='button' onclick='openModal(event)'>Voir plus d'infos</button>
        <?php } ?>

        <!-- Boîte modale -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Informations supplémentaires</h2>
                <div id="comicInfo" class="article">
                    <span class="click-indicator">Cliquer&rarr;</span>

                    <img class="hover-effect" id="modalImage" src="" onclick="updateModal(event)" alt="Image du personnage">
                    <br>
                    <h3>Alias :</h3>
                    <p id="modalAlias"></p>
                    <h3>Description :</h3>
                    <p id="modalDescription"></p>
                    <h3>Nom réel :</h3>
                    <p id="modalRealName"></p>
    </article>

    <!-- Affichage des commentaires -->
    <?php if (isLoggedIn()) : ?>

        <section class="form-container">
            <h2>Commentaires</h2>
            <?php if (!empty($albumComments)) : ?>
                <?php foreach ($albumComments as $comment) : ?>
                    <div>
                        <p><?php echo ($comment['content']); ?></p>
                        <p><b class='rating'>Posté par :</b> <?php echo ($comment['username']); ?> le <?php echo ($comment['dateC']); ?></p>
                        <?php if (isset($_SESSION['email']) && isAdmin($_SESSION['email'])) : ?>

                            <!-- Formulaire pour supprimer le commentaire -->
                            <form action="?action=albumsDetails&id=<?php echo $albumId ?>" method="post">
                                <?php if (isset($comment['id_com'])) : ?>
                                    <!-- Champ caché pour envoyer l'identifiant du commentaire à supprimer -->
                                    <input type="hidden" name="id_com" value="<?php echo $comment['id_com']; ?>">
                                <?php endif; ?>
                                <!-- Bouton de soumission pour supprimer le commentaire -->
                                <button class="button" type="submit" name="delete_comment">Supprimer le commentaire</button>
                            </form>

                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun commentaire pour cet album.</p>
            <?php endif; ?>
        </section>

        <!-- Formulaire pour ajouter un commentaire -->
        <section>
            <form class="form-container" action="?action=albumsDetails&id=<?php echo $albumId ?>" method="post">
                <h2>Ajouter un commentaire</h2>
                <input type="text" name="comment_content" placeholder="Ajouter un commentaire...">
                <input type="hidden" name="album_id" value="<?php echo ($albumId); ?>">
                <button class="button" type="submit" name="add_comment">Ajouter un commentaire</button>
            </form>
        </section>
    <?php endif; ?>

    <!-- Section Note -->
    <section class="form-container">
        <?php
        // Récupére toutes les notes attribuées à l'album
        $allAlbumRatings = getAllRatingsForAlbum($albumId);

        // Initialise la variable pour stocker la somme des notes
        $totalRating = 0;

        // Limite le nombre de notes à afficher à 10
        $limit = min(count($allAlbumRatings), 10);
        for ($i = 0; $i < $limit; $i++) :
        ?>
            <br>
            <h4 class="rating"><b>Note :</b> <?php echo $allAlbumRatings[$i]['rating_value']; ?></h4>
            <p><b>Posté par :</b> <?php echo $allAlbumRatings[$i]['username']; ?> le <?php echo $allAlbumRatings[$i]['rating_date']; ?></p>
            <?php if (isset($_SESSION['email']) && isAdmin($_SESSION['email'])) : ?>

                <!-- Formulaire pour supprimer l'évaluation en tant qu'administrateur -->
                <form action="?action=albumsDetails&id=<?php echo $albumId; ?>" method="post">
                    <input type="hidden" name="evaluation_id" value="<?php echo $allAlbumRatings[$i]['id_rating']; ?>">
                    <button class="button" type="submit" name="delete_rating">Supprimer l'évaluation</button>
                </form>
            <?php endif; ?>

        <?php
            // Ajoute la note à la somme des notes
            $totalRating += $allAlbumRatings[$i]['rating_value'];
        endfor;

        // Calcule la moyenne des notes
        if ($limit > 0) {
            $averageRating = $totalRating / $limit;
            echo "<h4 class='rating'><b>Moyenne des notes :</b> " . round($averageRating, 2) . "</h4>";
        } else {
            echo "<p class='rating'>Aucune note attribuée à cet album.</p>";
        }
        ?>

    </section>


    <?php if (isLoggedIn()) : ?>

        <!-- Formulaire pour ajouter une évaluation -->
        <form class="form-container" action="?action=albumsDetails&id=<?php echo $albumId ?>" method="post">
            <h2>Ajouter une évaluation</h2>
            <input type="number" name="rating_value" min="0" max="5" placeholder="Ajouter une évaluation...">
            <input type="hidden" name="id_album" value="<?php echo ($albumId); ?>">
            <button class="button" type="submit" name="add_rating">Ajouter une évaluation</button>
        </form>

    <?php endif; ?>
</main>

<?php include RACINE . '/view/footer.php'; ?>