<?php

require RACINE . '/model/bd.login.php';

function addAlbumWithImage($id_album, $title, $dateL, $content, $image)
{
    $db = connexionPDO(); 

    try {
        $stmt = $db->prepare("INSERT INTO `album` (`id_album`, `title`, `dateL`, `content`, `picture`) VALUES(:id_album, :title, :dateL, :content, :picture)");

        $stmt->bindParam(':id_album', $id_album, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':dateL', $dateL);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':picture', $image, PDO::PARAM_STR); 

        // Exécution de la requête
        $stmt->execute();
        return true; 
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de l'ajout de l'image";
        return false;
    }
    }

function getAllAlbums()
{
    $db = connexionPDO();

    try {
        $stmt = $db->prepare("SELECT * FROM `album`");
        $stmt->execute();

        $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $albums;
    }  catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la récuperation de l'image dans la BDD";
        return false;
    }
}


function getAlbumDetails($albumId)
{
    $db = connexionPDO();

    try {
        $stmt = $db->prepare("SELECT `id_album`, `title`, `dateL`, `content`, `picture` FROM `album`WHERE id_album = :albumId");
        $stmt->bindParam(':albumId', $albumId, PDO::PARAM_INT);
        $stmt->execute();

        $albumDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        return $albumDetails;
    }  catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la récuperation des albums";
        return false;
    }
    }

function deleteAlbum($albumId)
{
    $db = connexionPDO();

    try {
        $stmt = $db->prepare("DELETE FROM `album` WHERE `id_album` = :albumId");
        $stmt->bindParam(':albumId', $albumId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }  catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la suppression de l'album";
        return false;
    }
}
