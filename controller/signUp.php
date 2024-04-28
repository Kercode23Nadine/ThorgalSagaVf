<?php
require RACINE . '/model/bd.sign.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les champs sont définis et non vides
    if (isset($_POST["email"], $_POST["password"], $_POST["username"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = ($_POST["password"]);
        $username = htmlspecialchars($_POST["username"]);

        // Vérification de la validité de l'adresse email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Veuillez saisir une adresse email valide');</script>";
        } // Vérification de la longueur du mot de passe
        elseif (strlen($password) < 8) {
            echo "<script>alert('Le mot de passe doit contenir au moins 8 caractères');</script>";
        } // Vérification de la validité du nom d'utilisateur
        elseif (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username)) {
            echo "<script>alert('Votre pseudo ne doit contenir que des lettres');</script>";
        } else {
            // Hache le mot de passe avant de l'enregistrer dans la base de données
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Ajoute le nouvel utilisateur à la base de données
            $success = addUser($email, $hashedPassword, $username);
            if ($success) {
                // Redirige vers la page de connexion après une inscription réussie
                header("Location: ?action=connection");
                exit();
            } else {
                $_SESSION['msg'] = "<script>alert('Erreur lors de l\\'inscription. Veuillez réessayer.');</script>";
            }
        }
    } else {
        $_SESSION['msg'] = "<script>alert('Veuillez saisir tous les champs');</script>";
    }
}

include RACINE . '/view/viewSignUp.php';
?>
