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

if (!is_dir($idUser)) {
  mkdir($idUser, 0777);
}

$nameOfDirForWork = $_GET['course'] . ' ' . $_GET['challenge'];
$target_dir = $idUser . '/' . $nameOfDirForWork;

if (!is_dir($target_dir)) {
  mkdir($target_dir, 0777);
}

if (isset($_POST["submit"])) {
  $totalFiles = count($_FILES['fileToUpload']['name']);

  for ($i = 0; $i < $totalFiles; $i++) {
    $target_file = $target_dir . '/' . basename($_FILES["fileToUpload"]["name"][$i]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      echo "Désolé, le fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . " existe déjà.";
      $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"][$i] > 500000) {
      echo "Désolé, votre fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . " est trop gros.";
      $uploadOk = 0;
    }

    $allowedFormats = ["jpg", "png", "jpeg", "gif", "pdf", "ppt", "pptx"];
    if (!in_array($imageFileType, $allowedFormats)) {
      echo "Désolé, seul les fichiers JPG, JPEG, PNG, GIF, PDF, PPT & PPTX sont autorisés.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo " Votre fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . " n'a pas été uploadé.";
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
        echo "Le fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . " a été uploadé. <br>";
      } else {
        echo "Désolé, il y a eu une erreur durant l'upload du fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . ".";
      }
    }
  }
}


?>

<br>
<a href="index.php">Retour</a>