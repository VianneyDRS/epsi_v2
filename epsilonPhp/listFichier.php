<?php
include('header.php');

$isConnected = (isset($_COOKIE['mail']) || isset($_SESSION['mail'])) ? true : false;
if ($isConnected) {
    $mail = isset($_COOKIE['mail']) ? $_COOKIE['mail'] : $_SESSION['mail'];
} else {
    echo 'Vous n\'êtes pas connecté, veuillez vous inscrire ou vous connecter sur la page d\'accueil<br><a href="index.php">Retour</a>';
    exit();
}

function getIdUser()
{
    require('env.php');
    global $mail;
    $select = $db->query('SELECT id FROM user WHERE mail="' . $mail . '"');
    $result = $select->fetch();
    $counttable = count((is_countable($result) ? $result : []));
    if ($counttable != 0) {
        return $result['id'];
    } else {
        return 'erreur req';
    }
}

$idUser = getIdUser();

$nameOfDirForWork = $_GET['course'] . ' ' . $_GET['challenge'];
$target_dir = $idUser . '/' . $nameOfDirForWork;

if (!is_dir($target_dir)) {
    echo "Aucun fichier n'a été uploadé pour ce travail.";
} else {
    $files = scandir($target_dir);
    echo "<h2>Liste des fichiers uploadés</h2>";
    echo "<ul>";
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "<li>$file</li>";
        }
    }
    echo "</ul>";
}
?>

<br>
<a href="index.php">Retour</a>

