<?php
require RACINE . '/model/bd.profil.php';

function addUser($email, $password, $username)
{
    $db = connexionPDO();
    try {
        $req = $db->prepare("INSERT INTO `useru` (`username`, `email`, `password`) VALUES (:username, :email, :password)");
        $resultat = $req->execute([
            ':email' => $email,
            ':password' => $password,
            ':username' => $username
        ]);
        return $resultat;
    } catch (PDOException $e) {

        // Stocke les valeurs saisies dans le formulaire dans $_SESSION['old_input']
        $_SESSION['old_input'] = $_POST;
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de l'ajout de l'utilisateur";
        return false;
    }
}

function isAdmin($email)
{
    $user = getUserByEmail($email);
    if (!$user) {
        
        // L'utilisateur n'existe pas
        return false;
    }
    // Vérifie le rôle de l'utilisateur
    return $user['role'] == 1; //  1 soit le code pour le rôle d'administrateur base de données
}
unset($_SESSION['old_input']);