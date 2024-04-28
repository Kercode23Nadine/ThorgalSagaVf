<?php
require RACINE . '/model/bd.profil.php';

// Vérifie si le formulaire a été soumis pour mettre à jour le profil
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    
   
    if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['first_name'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $email = $_SESSION['email'];
      
        if (isset($_FILES['avatar'])) {
            $avatar = $_FILES['avatar'];
            $result = updateUser($email, $name, $username, $first_name, $avatar);
            if ($result) {
                $_SESSION['msg'] = "Votre compte a été mis à jour avec succès.";
            } else {
                $_SESSION['msg']= "Erreur : Impossible de mettre à jour votre compte.";
            }
        } else {
            $_SESSION['msg'] = "Erreur : Aucune image sélectionnée.";
        }
    } else {
        $_SESSION['msg'] = "Erreur : Tous les champs requis ne sont pas définis.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["destroy"])) {
    if (!empty($_SESSION['email'])) {

        $success = deleteUserByEmail($_SESSION['email']);

        if ($success) {
            unset($_SESSION['id_user']);
            unset($_SESSION['email']);
            unset($_SESSION['username']);
            unset($_SESSION['TROLL']);
           
            header("Location: ?action=home");
            exit();
        } else {
            $_SESSION['msg'] = "Erreur lors de la suppression du profil. Veuillez réessayer.";
        }
    } else {
        $_SESSION['msg'] = "La suppression du profil à échouée.";
    }
}

include RACINE . '/view/viewProfil.php';
