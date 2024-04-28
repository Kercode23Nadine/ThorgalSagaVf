<?php

require RACINE . "/model/bd.connect.php";
function updateUser($email, $password, $username, $name, $first_name, $avatar)
{
    try {
        $db = connexionPDO();
        $passwordHash = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

        // Préparation de la requête SQL pour mettre à jour les informations de l'utilisateur
        $sql = "UPDATE `useru` SET `email`=:email, `username`=:username, `name`=:name, `first_name`=:first_name" . (!empty($password) ? ", `password`=:password" : "");

        // Ajout de la gestion de l'avatar si une image est téléchargée
        if (!empty($avatar['name'])) {
            $avatarPath = '/asset/avatars/' . basename($avatar['name']); // Chemin où l'avatar sera stocké sur le serveur
            move_uploaded_file($avatar['tmp_name'], $avatarPath); // Télécharge l'avatar sur le serveur
            $sql .= ", `picture`=:picture"; // Ajouter le champ picture à la requête SQL
        }

        $sql .= " WHERE `email`=:email";

        $req = $db->prepare($sql);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':first_name', $first_name, PDO::PARAM_STR);

        if (!empty($password)) {
            $req->bindValue(':password', $passwordHash, PDO::PARAM_STR);
        }

        // Liaison du paramètre picture s'il est défini
        if (!empty($avatar['name'])) {
            $req->bindValue(':picture', $avatarPath, PDO::PARAM_STR);
        }

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        die("Erreur lors de la mise à jour du profil de l'utilisateur : " . $e->getMessage());
    }
}
function validateUserData($email, $password, $username, $name, $first_name)
{
    if (empty($email) || empty($password) || empty($username) || empty($name) || empty($first_name)) {
        return 'Veuillez saisir tous les champs.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Veuillez saisir une adresse email valide.';
    } elseif (strlen($password) < 8) {
        return "Le mot de passe doit contenir au moins 8 caractères.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]{3,25}$/", $username)) {
        return 'Votre pseudo ne doit contenir que des lettres, des chiffres et des caractères de soulignement.';
    }
    return null;
}


function getUser()
{
    $db = connexionPDO();
    try {

        $req = $db->prepare("SELECT `id_user`, `username`, `email`, `password`, `name`, `first_name`, `role` FROM `useru` ");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        die("Erreur !: " . $e->getMessage());
    }
}
// ok
function deleteUserByEmail($email)
{
    $db = connexionPDO();
    try {

        $req = $db->prepare("DELETE FROM `useru` WHERE `email` = :email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
    
        error_log("Erreur lors de la suppression de l'utilisateur : " . $e->getMessage());
        return false; 
    }
}
function getUserByUsername($username)
{
    $db = connexionPDO();
    try {

        $req = $db->prepare("SELECT `id_user`, `username`, `email`, `password`, `name`, `first_name`, `role`, `picture` FROM `useru` WHERE username=:username");
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();
        // Récupération du résultat sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
   
        error_log("Erreur lors de la récupération de l'utilisateur par email : " . $e->getMessage());
        return FALSE;
    }
}