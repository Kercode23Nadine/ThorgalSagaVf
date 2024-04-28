<?php
require RACINE . '/model/bd.user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["save"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = isset($_POST["password"]) ? $_POST["password"] : null;
        $username = htmlspecialchars($_POST["username"]);
        $name = htmlspecialchars($_POST["name"]);
        $first_name = htmlspecialchars($_POST["first_name"]);
        
        $errorMsg = validateUserData($email, $password, $username, $name, $first_name);
        if ($errorMsg === null) {
            $success = addUser($email, $password, $username, $name, $first_name, $role = 2);
            $msg = $success ? "Profil enregistré avec succès." : "Erreur lors de l'enregistrement du profil. Veuillez réessayer.";
        } else {
            $msg = $errorMsg;
        }
    } elseif (isset($_POST["update"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["username"];
        $name = $_POST["name"];
        $first_name = $_POST["first_name"];
        
        $errorMsg = validateUserData($email, $password, $username, $name, $first_name);
        if ($errorMsg === null) {
            $user = getUserByEmail($email);
            if ($user) {
                $id = $user['id'];
                
                // Gérer l'avatar s'il a été téléchargé
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $avatarData = file_get_contents($_FILES['avatar']['tmp_name']);
                } else {
                    $avatarData = null;
                }
                
                $success = updateUser($id, $email, $password, $username, $name, $first_name, $avatarData);
                $msg = $success ? "Profil mis à jour avec succès." : "Erreur lors de la mise à jour du profil. Veuillez réessayer.";
            } else {
                $msg = "L'utilisateur n'existe pas.";
            }
        } else {
            $msg = $errorMsg;
        }
    } elseif (isset($_POST["delete"])) {
        $email = $_POST["email"];
        if (!empty($email)) {
            $success = deleteUserByEmail($email);
            if ($success) {
                header("Location: ?action=home");
                exit();
            } else {
                $msg = "Erreur lors de la suppression du profil. Veuillez réessayer.";
            }
        } else {
            $msg = "L'e-mail est requis pour supprimer le profil.";
        }
    }
}

include RACINE . '/view/viewUser.php';
?>
