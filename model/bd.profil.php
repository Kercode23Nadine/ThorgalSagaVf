<?php

require RACINE . "/model/bd.connect.php";
function getUserByEmail($email)
{
    $db = connexionPDO();
    try {

        $req = $db->prepare("SELECT `id_user`, `username`, `email`, `password`, `name`, `first_name`, `role`, `picture` FROM `useru` WHERE email=:email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        // Récupération du résultat sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        $_SESSION['old_input'] = $_POST;
        error_log("Erreur lors de la récupération de l'utilisateur par email : " . $e->getMessage());
        // Gestion des erreurs PDO
        die("Erreur lors de la récupération de l'utilisateur par email : " . $e->getMessage());
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
        // Gestion des erreurs PDO
        error_log("Erreur lors de la récupération de l'utilisateur par email : " . $e->getMessage());
        return FALSE;
    }
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
unset($_SESSION['old_input']);

function updateUser($email, $name, $username, $first_name, $avatar)
{
    try {
        $db = connexionPDO();
        // Récupére le nom de fichier temporaire de l'avatar
        $tmpName = $avatar['tmp_name'];
        // Chemin où l'avatar sera stocké sur le serveur
        $avatarPath = 'asset/avatars/' . basename($avatar['name']);
        // Déplace le fichier d'avatar vers le dossier de destination
        if (move_uploaded_file($tmpName, $avatarPath)) {
            // Préparation de la requête SQL pour mettre à jour l'utilisateur
            $sql = "UPDATE `useru` SET `name`=:name, `username`=:username, `first_name`=:first_name, `picture`=:picture WHERE email = :email ";

            $req = $db->prepare($sql);
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':username', $username, PDO::PARAM_STR);
            $req->bindValue(':first_name', $first_name, PDO::PARAM_STR);
            $req->bindValue(':picture', $avatarPath, PDO::PARAM_STR);

            $resultat = $req->execute();
            return $resultat;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la mise à jour de l'utilisateur";
        return false;
    }
}


function deleteUserByUsername($username)
{
    $db = connexionPDO();
    try {
        $req = $db->prepare("DELETE FROM `useru` WHERE `username` = :username");
        $req->bindValue(':username', $username, PDO::PARAM_STR);

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la suppression de l'utilisateur";
        return false;
    }
}
function deleteUserByEmail($email)
{
    $db = connexionPDO();
    try {
        $stmt = $db->prepare("DELETE FROM useru WHERE email = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $result = $stmt->execute();

        return $result;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la suppression de l'utilisateur";
        return false;
    }
}
