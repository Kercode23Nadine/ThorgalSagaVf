<?php

require RACINE . '/model/bd.albums.php';

// Ajout d'un nouvel album avec une image
if (isset($_POST['add_album'])) {
    if (isset($_FILES['image'])) {
        $tmpName = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];

        //  l'extension de l'image
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];

        // la taille de l'image
        $maxSize = 400000; // 400 KB
        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
            // le dossier de destination pour l'image
            $uploadDir = 'asset/upload/';
            //  un nom de fichier unique
            $uniqueName = uniqid();
            //  l'extension du fichier
            $file = $uniqueName . '.' . $extension;
            // Chemin complet du fichier de destination
            $image = $uploadDir . $file;

            // Dossier de destination
            if (move_uploaded_file($tmpName, $image)) {
                // Récupére les autres données de l'album à partir du formulaire
                $title = htmlspecialchars($_POST['title']);
                $dateL = ($_POST['dateL']);
                $content = htmlspecialchars($_POST['content']);

                // Vérifie si l'ID de l'album est présent dans le formulaire
                if (isset($_POST['id_album'])) {
                    $id_album = $_POST['id_album']; 
                } else {
                    $id_album = null; 
                }

                // Appel de la fonction pour ajouter l'album avec le chemin de l'image
                if (addAlbumWithImage($id_album, $title, $dateL, $content, $image)) {
                    // Redirige vers la page TROLL
                    header("Location: ?action=albums");
                    exit();
                } else {
                    $_SESSION['msg'] = "Erreur lors de l'ajout de l'album.";
                }
            } else {
                $_SESSION['msg'] ="Une erreur est survenue lors du téléchargement de l'image.";
            }
        } else {        
            $_SESSION['msg'] = "L'extension de fichier n'est pas autorisée ou la taille de l'image est trop grande.";
        }
    }
}

// Traitement de la suppression d'un album par l'TROLListrateur
if (isset($_POST['delete_album']) && isset($_POST['id_album'])) {
    $id_album = $_POST['id_album'];

    if (deleteAlbum($id_album)) {
        header("Location: ?action=TROLL");
        exit();
    } }

// Récupération de tous les albums
$albums = getAllAlbums();


include RACINE . '/view/viewAlbums.php';