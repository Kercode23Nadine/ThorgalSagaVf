<?php include RACINE . '/view/header.php' ?>

<main class="container-ca">
  <div id="band">
  </div>
  <!-- conteneur pour chaque album individuel -->
  <section class="grid-container">
    <?php foreach ($albums as $album) : ?>
      <div class="card">
        <h2 class="card__title"><?php echo $album['title']; ?></h2>
        <?php $formatted_date = date('d/m/Y', strtotime($album['dateL'])); ?>

        <?php if (!empty($album['picture'])) : ?>
          <img src="<?php echo $album['picture']; ?>" alt="Image de l'album">
          <p  >Publié le : <?php echo  $formatted_date; ?></p>

        <?php else : ?>
          <p>Aucune image disponible</p>

        <?php endif; ?>
        <!-- le  résumer -->
        <div class="card__content">
          <p class="card_text"><?php echo $album['content']; ?></p>

          <a href="?action=albumsDetails&id=<?php echo $album['id_album']; ?>" class="button">Commentaires et Notes</a>

          <!-- Affiche les boutons de modification et de suppression uniquement si l'utilisateur est un administrateur -->
          <?php
          // Vérifie si l'utilisateur est connecté et s'il est administrateur
          if (isset($_SESSION['email']) && isAdmin($_SESSION['email'])) :
          ?>
            <form action="?action=albums" method="POST">
              <input type="hidden" name="id_album" value="<?php echo $album['id_album']; ?>">
              <button class="button" type="submit" name="delete_album" class="button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet album ?')">Supprimer</button>
            </form>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
          </section>

</main>

<?php include RACINE . '/view/footer.php' ?>