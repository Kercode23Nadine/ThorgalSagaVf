<?php
if(!isset($_SESSION))
{
    session_start();
}

// Inclusion de l'autoloader Dotenv
require __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;
// Chargement des variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Inclusion du fichier de configuration
require __DIR__ . "/controller/config.php";
require __DIR__ . '/controller/router.php';

?>