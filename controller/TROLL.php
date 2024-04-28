<?php
require RACINE . '/model/bd.albums.php';

if (isset($_POST["delete"])) {
    $username = $_POST["username"];
    if (!empty($username)) {
        $success = deleteUserByUsername($username);
        if ($success) {
            header("Location: ?action=TROLL");
            $_SESSION['msg'] = " La suppression du profil fut un succès .";
            exit();
        } else {
            $_SESSION['msg'] = "Erreur lors de la suppression du profil. Veuillez réessayer.";
        }
    } else {
        $_SESSION['msg'] = "Le pseudo est requis pour supprimer le profil.";
    }
}
include RACINE . '/view/viewAdmin.php'; 
?>
