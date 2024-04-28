<?php

require RACINE . '/model/bd.authors.php';

// Vérification si des données ont été soumises via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérification de la présence des données du formulaire
    if (isset($_POST["fonction"], $_POST["name"], $_POST["first_name"], $_POST["biography"])) {
        // Récupération des données du formulaire
        $fonction = $_POST["fonction"];
        $name = $_POST["name"];
        $first_name = $_POST["first_name"];
        $biography = $_POST["biography"];

        // Récupération du chemin temporaire du fichier téléchargé
        $tempFilePath = $_FILES['picture']['tmp_name'];

        // Vérification de l'extension du fichier
        $tabExtension = explode('.', $_FILES['picture']['name']);
        $extension = strtolower(end($tabExtension));
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];

        // Vérification de la taille du fichier
        $maxSize = 400000; // 400 KB
        if (in_array($extension, $extensions) && $_FILES['picture']['size'] <= $maxSize && $_FILES['picture']['error'] == 0) {
            // le dossier de destination pour l'image
            $uploadDir = 'asset/authors/';
            //  un nom de fichier unique
            $uniqueName = uniqid();
            //  l'extension du fichier
            $file = $uniqueName . '.' . $extension;
            // Chemin complet du fichier de destination
            $image = $uploadDir . $file;

            // Déplacer le fichier téléchargé vers le dossier de destination
            if (move_uploaded_file($tempFilePath, $image)) {
                // Insertion des données dans la base de données
                if (addAuthor($fonction, $name, $first_name, $biography, $image)) {
                    $_SESSION['msg'] = "L'auteur a été ajouté avec succès.";
                } else {
                    $_SESSION['msg'] = "Erreur : Impossible d'ajouter l'auteur. Veuillez réessayer plus tard.";
                }
            } else {
                $_SESSION['msg'] = "Erreur : Impossible de télécharger l'image.";
            }
        } else {
            $_SESSION['msg'] = "Erreur : Le fichier téléchargé n'est pas valide.";
        }
    } else {
        $_SESSION['msg']= "Succés!";
    }
  
    if (isset($_POST['id_author'])) {
      
        $id_author = $_POST["id_author"];

        // Suppression de l'auteur
        if (deleteAuthor($id_author)) {
            // Redirection vers la page des auteurs après la suppression réussie
            header("Location: ?action=authors");
            exit(); 
        } else {
            $_SESSION['msg'] = "Erreur : Impossible de supprimer l'auteur.";
        }
    }
}


$authors = getAllAuthors();


include RACINE . '/view/viewAuthors.php';
?>