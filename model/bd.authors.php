<?php

require RACINE . '/model/bd.community.php';

function addAuthor( $fonction, $name, $first_name, $biography, $picture)
{
    try {
        $db = connexionPDO();
        $stmt = $db->prepare("INSERT INTO `author`( `fonction`, `name`, `first_name`, `biography`, `picture`) VALUES ( :fonction, :name, :first_name, :biography, :picture)");

        $stmt->bindValue(':fonction', $fonction, PDO::PARAM_STR);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindValue(':biography', $biography, PDO::PARAM_STR);
        $stmt->bindValue(':picture', $picture, PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de l'ajout de l'auteur";
        return false;
    }
}


function getAllAuthors()
{
    $db = connexionPDO();
    try {
        $stmt = $db->prepare("SELECT * FROM author");
        $stmt->execute();

        $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $authors;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la récupération des auteurs";
        return false;
    }
}

function deleteAuthor($id_author)
{
    $db = connexionPDO();
    try {
        $stmt = $db->prepare("DELETE FROM `author` WHERE `id_author` = :id_author");
        $stmt->bindValue(':id_author', $id_author, PDO::PARAM_STR);
        $result = $stmt->execute();

        return $result;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erreur lors de la suppression de l'auteur";
        return false;
    }
}
