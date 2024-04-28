<?php
require RACINE . "/model/bd.sign.php";
function login($email, $password)
{
    $util = getUserByEmail($email);
    if (!$util) {
        // Si l'utilisateur n'existe pas, stock les valeurs saisies dans $_SESSION['old_input']
        $_SESSION['old_input'] = $_POST;
        return false;
    }
    $mdpBD = $util["password"];
    $role = $util["role"]; // Récupére le rôle de l'utilisateur
    if (password_verify($password, $mdpBD)) {
        $_SESSION["email"] = $email;
        $_SESSION["id_user"] = $util["id_user"];
        $_SESSION["username"] = $util["username"];

        if ($role == 1) {
            //  TROLListrateur
            $_SESSION["TROLL"] = true;
        } else {
            // L'utilisateur n'est pas un TROLListrateur
            $_SESSION["TROLL"] = false;
        }
        return true;
    } else {
        $_SESSION['old_input'] = $_POST;
        return false;
    }
}

unset($_SESSION['old_input']);
function isLoggedIn()
{
    return isset($_SESSION['email']);
}
