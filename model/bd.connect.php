
<?php
function connexionPDO()
{
    try {
        $db = new PDO(
            "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD']
        );
    
        // Défini le mode d'erreur PDO sur Exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $db;
    } catch (PDOException $error) {
        // Gestion des erreurs PDO
        $errorMessage = "La connexion à la base de données a échoué: " . $error->getMessage();
        $errorMessage .= ". Veuillez vérifier vos informations de connexion à la base de données et assurez-vous que le serveur de base de données est accessible.";
    
        die($errorMessage);
    }
    
}



?>
