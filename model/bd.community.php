<?php
require RACINE . '/model/bd.albums.php';

// Ajout d'un commentaire global par utilisateur
function addGlobalComment($content, $id_user)
{
    $db = connexionPDO();
    try {
        $content = htmlspecialchars($content, ENT_QUOTES);
        $stmt = $db->prepare("INSERT INTO `comment`(`content`, `id_user`) VALUES (?, ?)");
        $stmt->execute([$content, $id_user]);
        return true;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de l'ajout du commentaire global";
        return false;
    }
}

// Récupération des commentaires globaux par utilisateur
function getGlobalComments()
{
    $db = connexionPDO();
    try {

        $stmt = $db->prepare("SELECT c.*, u.username 
                              FROM `comment` c, `useru` u
                              WHERE c.id_user = u.id_user 
                                AND c.id_album IS NULL
                              ORDER BY c.id_com");
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur de connexion à la base";
        return false;
    }
}
