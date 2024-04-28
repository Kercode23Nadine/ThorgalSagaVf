<?php

require RACINE . '/model/bd.login.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"], $_POST["password"])) {
    $email = htmlspecialchars($_POST["email"]);
    $password = ($_POST["password"]);

    // Validation des entrées utilisateur
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (login($email, $password)) {
        
            $isAdmin = isAdmin($email);

            if ($isAdmin) {
                header("Location: ?action=TROLL");
                exit();
            } else {
                header("Location: ?action=profil");
                exit();
            }
        } else {
            $_SESSION['msg']  = "Identifiants incorrects. Veuillez réessayer.";
        }
    } else {
        $_SESSION['msg']  = "Adresse e-mail invalide.";
    }
}

include_once RACINE . '/view/viewLogin.php';

?>
