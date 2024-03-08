<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Epsilon</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="text-green-700 overflow-hidden h-screen bg-gradient-to-b from-fuchsia-400 to-fuchsia-700">
        <div class="pt-28">
            <div class="flex flex-col items-center justify-center text-center bg-gradient-to-b from-white to-transparent w-fit h-fit mx-auto px-20 rounded-xl">
                <?php
                    include 'header.php';
                ?>
                <div class="flex">
                    <img src="william.jpg" alt="William, prince de Galles" class="w-40 rounded-full">
                    <img src="vianney.jpg" alt="Vianney, chanteur populaire Français" class="w-40 rounded-full">
                </div>
                <p class="my-4">William DOURLENS<br>Groupe : Vianney DRS, Téo Fiminski</p>
                <p class="my-4">16<br>Facilement modifiable, aucun problème rencontré,<br>mérite 20 si plus de points disponible</p>
                <a href="upload.php"><p class="mb-4 underline text-fuchsia-900">Upload your file !</p></a>
                <?php
                    include 'footer.php';
                ?>
            </div>
        </div>
    </body>
</html>