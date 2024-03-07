<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/index.css">
        <title>Epsi v2</title>
    </head>
    <body>
        <div class="div1">
            <div class="div2">
                <?php
                    include 'header.php';
                ?>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fichier" class="fichierSelect">
                    <button type="submit" name="envoyer" class="fichierEnvoye">Envoyer</button>
                </form>
                <bouton><a href="index.php">-> Retour <-</a></bouton>
                <?php
                    include 'footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['envoyer'])){
        $dossier = 'upload/';
        $fichier = basename($_FILES['fichier']['name']);
        $extension = strtolower(pathinfo($fichier, PATHINFO_EXTENSION));
        $extensionsAutorisees = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'zip', 'rar', '7z', 'mp3', 'wav', 'mp4', 'avi');

        // Vérifie si le fichier existe déjà
        $i = 1;
        $nouveauNom = $fichier;
        while(file_exists($dossier . $nouveauNom)){
            $nouveauNom = pathinfo($fichier, PATHINFO_FILENAME) . $i . '.' . $extension;
            $i++;
        }

        if(in_array($extension, $extensionsAutorisees)){
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $nouveauNom)){
                echo 'Upload effectué avec succès !';
            }else{
                echo 'Echec de l\'upload !';
            }
        }else{
            echo 'Extension de fichier non autorisée !';
        }
    }
?>