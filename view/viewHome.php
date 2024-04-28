<?php include RACINE . '/view/header.php' ?>
<main>
    <div id="band"> </div>
    <article class="article">
        <h2>Dernieres News</h2>
        <p>Les albums individuels
            thorgal-sagaThorgal Saga
            Portée par d’autres auteurs invités à imaginer leur propre vision du monde de Thorgal, la collection Thorgal Saga offre de nouveaux voyages au sein d’albums individuels au format généreux et à la pagination plus dense.
            Chaque album se place à un moment différent de l’histoire de nos héros, que ce soit dans leur passé, leur présent ou même leur futur.</p>
    </article>
    <!-- Premier slider -->

    <div id="slider">
        <button class="left">&lt;</button>
        <?php
        $images = array(
            "./asset/images/tome/t5.jpg",
            "./asset/images/tome/t2.jpg",
            "./asset/images/tome/t8.jpg",
        );
        foreach ($images as $index => $image) {
            $class = ($index == 0) ? 'slide active' : 'slide';
            echo '<div class="' . $class . '"><img src="' . $image . '" alt="Image ' . ($index + 1) . '"></div>';
        }
        ?>
        <button class="right">&gt;</button>
    </div>

    <article class="article">
        <h2>Les nouveautés</h2>
        <p>Les Mondes de Thorgal
            L’aventure se prolonge également au sein d’une collection qui réunit plusieurs personnages emblématiques de la série originelle, ou qui voyage dans le temps vers les origines de leur histoire.
            serie-krissKriss de Valnor
            Au cours de ses aventures tumultueuses, Thorgal a régulièrement croisé le chemin de Kriss de Valnor. Aventurière sans scrupules, séduisante et dangereuse, la belle jeune femme veut plus que tout se bâtir un empire sur le monde des hommes.
            Kriss est prête à tout pour réussir. Un seul homme a de la valeur a ses yeux, et le pouvoir de la faire reculer. Thorgal, le Viking errant.</p>
    </article>

    <!-- Deuxième slider -->

    <div id="second-slider">
        <button class="second-left">&lt;</button>
        <?php
        $second_images = array(
            "./asset/images/tome/t19.jpg",
            "./asset/images/tome/t12.jpg",
            "./asset/images/tome/t18.jpg",
        );
        foreach ($second_images as $index => $image) {
            $class = ($index == 0) ? 'second-slide active' : 'second-slide';
            echo '<div class="' . $class . '"><img src="' . $image . '" alt="Image album ' . ($index + 1) . '"></div>';
        }
        ?>
        <button class="second-right">&gt;</button>
    </div>
</main>
<?php include RACINE . '/view/footer.php' ?>