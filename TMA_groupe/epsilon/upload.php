<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Epsilon - Upload</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="text-green-700 overflow-hidden h-screen bg-gradient-to-b from-fuchsia-400 to-fuchsia-700">
        <div class="pt-28">
            <div class="flex flex-col items-center justify-center text-center bg-gradient-to-b from-white to-transparent w-fit h-fit mx-auto px-20 rounded-xl">
                <?php
                    include 'header.php';
                ?>
                <form action="upload.php" method="post" enctype="multipart/form-data" class="flex flex-col items-center justify-center mt-4 mb-8">
                    <input type="file" name="fichier" class="mb-4">
                    <button type="submit" name="envoyer" class="underline text-fuchsia-900 mb-4">Envoyer</button>
                    <?php
                    // Vérifier si le formulaire est envoyé
                    if(isset($_POST['envoyer'])){

                        // Verifier si aucun fichier n'est envoyé
                        if(empty($_FILES['fichier']['name'])){
                            echo 'Aucun fichier sélectionné !';
                        } else {
                            $dossier = 'uploads/';

                            // Créer le dossier s'il n'existe pas
                            if (!file_exists($dossier)) {
                                mkdir($dossier, 0777, true);
                            }

                            $fichier = basename($_FILES['fichier']['name']);
                            $extension = pathinfo($fichier, PATHINFO_EXTENSION);
                            $extensionsAutorisees = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx');
                            $imageInfo = getimagesize($_FILES['fichier']['tmp_name']);

                            // Vérifier si le fichier est une image ou un PDF
                            if(in_array($extension, $extensionsAutorisees) && ($imageInfo !== false || $extension === 'pdf')) {
                                $fichierSansExtension = pathinfo($fichier, PATHINFO_FILENAME);
                                $i = 1;

                                // Vérifier si le fichier existe déjà
                                while(file_exists($dossier . $fichier)){
                                    $fichier = $fichierSansExtension . '_' . $i . '.' . $extension; // Renommer le fichier uploadé
                                    $i++;
                                }

                                // Déplacer le fichier uploadé
                                if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)){
                                    echo 'Upload effectué avec succès !';
                                    header("Refresh : 2; url=upload.php"); // Empêche l'utilisateur de renvoyer le même fichier en boucle
                                }else{
                                    echo 'Echec de l\'upload !';
                                }
                            } else {
                                echo 'Le fichier sélectionné n\'est pas une image ou un PDF !';
                            }
                        }
                    }
                    ?>
                </form>
                <?php
                    include 'footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
