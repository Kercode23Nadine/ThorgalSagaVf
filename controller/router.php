<?php

// router pour envoyer vers les bonnes pages !
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'signUp':
            require RACINE . '/controller/signUp.php';
            break;
        case 'connection':
            require RACINE . '/controller/login.php';
            break;
        case 'deconnect':
            require RACINE . '/controller/deconnect.php';
            break;
        case 'profil':
            require RACINE . '/controller/profil.php';
            break;
        case 'home':
            require RACINE . '/controller/home.php';
            break;
        case 'authors':
            require RACINE . '/controller/authors.php';
            break;
        case 'albums':
            require RACINE . '/controller/albums.php';
            break;
        case 'albumsDetails':
            require RACINE . '/controller/albumsDetails.php';
            break;
        case 'community':
            require RACINE . '/controller/community.php';
            break;
        case 'gallery':
            require RACINE . '/controller/gallery.php';
            break;
        case 'ml':
            require RACINE . '/controller/ml.php';
            break;
        case 'ca':
            require RACINE . '/controller/ca.php';
            break;
        case 'TROLL':
            require RACINE . '/controller/TROLL.php';
            break;
        case 'cookie':
            require RACINE . '/controller/cookie.php';
            break;
        default:
            // Cas par défaut si l'action n'est pas reconnue
            require RACINE . '/controller/default.php';
            break;
    }
} else {

    require RACINE . '/controller/home.php';
}