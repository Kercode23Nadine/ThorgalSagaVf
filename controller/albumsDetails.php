<?php
require RACINE . '/model/bd.albumsDetails.php';

// Vérification si l'identifiant de l'album est passé dans l'URL
if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    $_SESSION['msg'] = "Erreur : Identifiant de l'album non spécifié.";
    exit();
}

$albumDetails = getAlbumDetails($albumId);

// Traitement de l'ajout d'un commentaire à l'album
if (isset($_POST['add_comment'])) {
    $userId = $_SESSION['id_user'];
    $commentContent = $_POST['comment_content'];
    $albumId = $_GET['id'];
    if (addComment($commentContent, $userId, $albumId)) {
        // Redirection vers la page des détails de l'album après l'ajout du commentaire
        header("Location: ?action=albumsDetails&id=$albumId");
        exit();
    } else {
        $_SESSION['msg'] ="Erreur : Impossible d'ajouter le commentaire.";
    }
}

// Traitement de l'ajout d'une note à l'album
if (isset($_POST['add_rating'])) {
    $userId = $_SESSION['id_user'];
    $ratingValue = $_POST['rating_value'];

    if (addRating($ratingValue, $userId, $albumId)) {
        // Redirection vers la page des détails de l'album après l'ajout de la note
        header("Location: ?action=albumsDetails&id=$albumId");
        exit();
    } else {        
        $_SESSION['msg'] = "Erreur : Impossible d'ajouter la note.";
    }
}

// Récupération des notes de l'album
$albumRatings = getAlbumRatings($albumId);
$albumComments = getAllComments($albumId);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si l'utilisateur est un administrateur et si le bouton de suppression d'évaluation en tant qu'administrateur a été cliqué
    if (isset($_POST["delete_rating"]) && isAdmin($_SESSION['email'])) {
        $evaluationId = $_POST["evaluation_id"];
        $success = deleteEvaluation($evaluationId);

        if ($success) {  
            $_SESSION['msg'] = "L'évaluation a été supprimée avec succès.";
        } else {
        
            $_SESSION['msg']  = "Erreur : Impossible de supprimer l'évaluation.";
        }

    // / Vérification si le bouton de suppression de commentaire a été cliqué
    if (isset($_POST['delete_comment'])) {
       
        $commentIdToDelete = $_POST['id_com'];
        $success = deleteComment($commentIdToDelete);

        // Vérifie si la suppression a réussi
        if ($success) {
            // Affiche un message de succès
            $_SESSION['msg'] = "Le commentaire a été supprimé avec succès.";
           
        } else {
            $_SESSION['msg'] = "Une erreur s'est produite lors de la suppression du commentaire.";
        }
    }
}

}
// Préparation des identifiants ComicVine des personnages de l'album
$albumCharacters = getAlbumCharacters($albumId);
if (!$albumCharacters) $albumCharacters = array();
$JSONalbumCharacters = json_encode($albumCharacters);
include RACINE . '/view/viewAlbumsDetails.php';
?>