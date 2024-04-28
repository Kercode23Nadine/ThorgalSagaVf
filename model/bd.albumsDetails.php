<?php
require RACINE . '/model/bd.authors.php';

// Fonction pour afficher les détails de l'album
function showAlbumDetails($albumId)
{
    $albumDetails = getAlbumDetails($albumId);
    if ($albumDetails) {

        include RACINE . '/view/viewAlbumsDetails.php';
    } else {
        $_SESSION['msg'] ="Erreur : Impossible de récupérer les détails de l'album.";
    }
}
// Ajout d'un commentaire par album
function addComment($content, $id_user, $id_album)
{
    $db = connexionPDO();
    try {
        $content = htmlspecialchars($content, ENT_QUOTES);
        $stmt = $db->prepare("INSERT INTO `comment`(`content`, `id_user`, `id_album`) VALUES (?, ?, ?)");
        $stmt->execute([$content, $id_user, $id_album]);
        return true;
    }catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de l'ajout des commentaires'";
        return false;
    }
}

// Ajout d'une note par album
function addRating($rating_value, $id_user, $id_album = NULL)
{
    $db = connexionPDO();
    try {
        $stmt = $db->prepare("INSERT INTO `rating`(`rating_value`, `id_user`, `id_album`) VALUES (?, ?, ?)");
        $stmt->execute([$rating_value, $id_user, $id_album]);
        return true;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de l'ajout de la note";
        return false;
    }
}
function getAllComments($albumId)
{
    $db = connexionPDO();
    try {

        $query= "SELECT c.* ,u.username 
        FROM comment c
        INNER JOIN useru u ON c.id_user = u.id_user
        WHERE c.id_album = :id_album "     
        ;
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_album', $albumId, PDO::PARAM_INT);

        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }  catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la récupération des albums";
        return false;
    }
}

function deleteComment($commentId)
{
    $db = connexionPDO();

    try {
        $stmt = $db->prepare("DELETE FROM comment WHERE id_com = :id_com");
        $stmt->bindValue(':id_com', $commentId, PDO::PARAM_INT);
        $result = $stmt->execute();
        
        return $result; 
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la suppression du commentaire";
        return false;
    }
}

function getAlbumRatings($albumId)
{
    $db = connexionPDO();
    try {
      
        $query= "SELECT r.* ,u.username 
        FROM rating r
        INNER JOIN useru u ON r.id_user = u.id_user
        WHERE r.id_album = :id_album "     
        ;
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_album', $albumId, PDO::PARAM_INT);
        $stmt->execute();

        $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ratings;
    }  catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la récupération de notes/album";
        return false;
    }
}


function deleteEvaluation($evaluationId)
{
    $db = connexionPDO();

    try {
        $stmt = $db->prepare("DELETE FROM rating WHERE id_rating = :id_rating");
        $stmt->bindValue(':id_rating', $evaluationId, PDO::PARAM_INT);
        $result = $stmt->execute();
        
        return $result; 
    }  catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la suppression de l'évaluation";
        return false;
    }
}
function getAllRatingsForAlbum($albumId)
{
    $db = connexionPDO();
    try {
        $query = "SELECT r.*, u.username 
                  FROM rating r
                  INNER JOIN useru u ON r.id_user = u.id_user
                  WHERE r.id_album = :id_album";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_album', $albumId, PDO::PARAM_INT);
        $stmt->execute();

        $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ratings;
    }  catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la récupération de notes par album";
        return false;
    }
}
function getAlbumCharacters($albumId)
{
    $db = connexionPDO();
    try {
      
        $query= "SELECT c.id_extern , c.name 
            FROM characters c
            INNER JOIN see s ON c.id_char = s.id_char
            WHERE s.id_album = :id_album ";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_album', $albumId, PDO::PARAM_INT);
        $stmt->execute();

        $chars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $chars;
    }  catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la récupération des références des informations complémentaires";
        return false;
    }
}

?>