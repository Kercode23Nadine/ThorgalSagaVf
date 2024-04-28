<?php
$menuI = array(
    "Accueil" => "?action=home",
    "Auteurs" => "?action=authors",
    "Albums" => "?action=albums",
    "Communauté" => "?action=community",
    "Galerie" => "?action=default",
);

if (isset($_SESSION['email']))
    if ($_SESSION['TROLL']) {
        $menuI["add"] = "?action=TROLL";
        $menuI["Déconnexion"] = "?action=deconnect";
    } else {
        $menuI["Profil"] = "?action=profil";
        $menuI["Déconnexion"] = "?action=deconnect";
    }
else {
    //non connectés
    $menuI["Inscription"] = "?action=signUp";
    $menuI["Connexion"] = "?action=connection";
}
?>

<!doctype html>
<html lang="fr">
<?php include RACINE . '/view/head.php'; ?>

<body id="container">
    <header id="banner">

        <!-- logo -->
        <div class="top">
            <a href="?action=home">
                <img class="logo" src="asset/images/Icons&logo&avatar/thorgal1.png" alt="Logo de l'association">
            </a>
        </div>

        <!-- menu burger -->
        <nav id="mySidenav" class="sidenav">
            <a id="closeBtn" href="#" class="close">&times;</a>
            <ul>
                <?php
                // Affichage des éléments du menu
                foreach ($menuI as $label => $link) {
                    echo "<li><a href=\"$link\">$label</a></li>";
                }
                ?>
            </ul>
            <a href="#" id="openBtn">
                <span class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
        </nav>
    </header>
    <div class="form-container" <?php if (!isset($_SESSION['msg'])) echo "style='display:none;'"; ?>>
        <?php
        if (isset($_SESSION['msg'])) {
            echo "<p>" . $_SESSION['msg'] . "</p>";
            unset($_SESSION['msg']);
        }
        ?>
    </div>