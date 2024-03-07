<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="base.css">
        <title>Epsi v2</title>
    </head>
    <body>
        <div class="mise_en_page">
            <div class="fond_pour_affichage">
                <?php
                    include 'assets/header.php';
                ?>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fichier" class="fichierSelect">
                    <button type="submit" name="envoyer_fichier" >Envoyer</button>
                </form>
                <bouton><a class="bouton_retour" href="index.php">-> Retour <-</a></bouton>
                <?php
                    include 'assets/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
<?php
    // Fonction pour uploader un fichier
    if(isset($_POST['envoyer_fichier'])){
        $dossier = 'upload/';
        $fichier = basename($_FILES['fichier']['name']);

        try {
            if (empty($fichier)) {
                throw new Exception('Aucun fichier sélectionné');
            }
    
            // Récupère l'extension du fichier et définie celle autorisée
            $extension = strtolower(pathinfo($fichier, PATHINFO_EXTENSION));
            $extensionsAutorisees = array('jpg', 'jpeg', 'png', 'pdf');
    
            // Vérifie si le fichier existe déjà
            $compteur_fichier = 1;
            $nouveauNom = $fichier;
            while (file_exists($dossier . $nouveauNom)) {
                $nouveauNom = pathinfo($fichier, PATHINFO_FILENAME) . $compteur_fichier . '.' . $extension;
                $compteur_fichier++;
            }
    
            // Vérifie si l'extension du fichier est autorisée
            if (!in_array($extension, $extensionsAutorisees)) {
                throw new Exception('Extension de fichier non autorisée !');
            }
    
            if (move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $nouveauNom)) {
                echo 'Upload effectué avec succès !';
            } else {
                throw new Exception('Echec de l\'upload !');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
?>