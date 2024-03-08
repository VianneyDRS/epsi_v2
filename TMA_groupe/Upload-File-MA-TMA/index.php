<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Teo's Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full">
    <div class="w-full h-screen flex flex-wrap justify-center items-center bg-gradient-to-b from-purple-100 to-purple-500">
        <div class="h-[80vh] rounded-md w-2/3 md:w-1/2 lg:w-1/3 bg-gray-400 flex flex-wrap justify-center content-start py-4 bg-gradient-to-b from-white to-purple-400 text-green-400">
            <?php include("./header.php"); ?>
            <div class="w-full flex flex-wrap justify-center">
                <img src="https://pbs.twimg.com/media/FBVcjQtWYAM39Po.jpg" alt="Une image de Teo" class="rounded-full w-1/4">
                <img src="vianney.jpg" alt="Une image de Vianney" class="rounded-full w-1/4">
            </div>
            <div class="w-full flex flex-wrap justify-center">
                <h4 class="text-lg">FskiTeo</h4>
            </div>
            <div class="w-4/5 flex flex-wrap justify-center text-center">
                <h4 class="text-lg">Groupe : DE RAPHELIS-SOISSAN Vianney, DOURLENS William</h4>
            </div>
            <div class="w-4/5 flex flex-wrap justify-center text-center">
                <h4 class="text-lg">16 : Facilement modifiable, aucun problème rencontré, mérite 20 si plus de points disponible</h4>
            </div>
            <div class="w-full flex flex-wrap justify-center">
                <a href="upload.php" class="italic underline">Upload your file !</a>
            </div>
            <?php include("./footer.php"); ?>
        </div>
    </div>
</body>
</html>