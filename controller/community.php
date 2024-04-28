<?php
require RACINE . '/model/bd.community.php'; 

// Vérifie si l'utilisateur est connecté
if (!isLoggedIn()) {
    header("Location: ?action=signUp");
    exit();
}

// Ajout d'un commentaire global si le formulaire de commentaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_content'])) {
    $content = $_POST['comment_content'];
    $id_user = $_SESSION['id_user']; 
    

    addGlobalComment($content, $id_user);
    header("Location: ?action=community");
    exit();
}

// Récupére les commentaires globaux
$global_comments = getGlobalComments();

// Récupére les notes globales par utilisateur connecté
$id_user = $_SESSION['id_user']; 


include RACINE . '/view/viewCommunity.php'; 
?>
