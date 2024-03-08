<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_FILES['fileToUpload']) && isset($_POST['submitUpload'])){
        if(in_array($imageFileType, array("pdf", "png", "jpg", "svg", "docx"))){
            if (!file_exists($target_file)) {
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                    $success = "Your file has been uploaded !";
                }
            } else {
                $error = "Sorry, file already exists.";
            }
        } else {
            $error = "File must be a .pdf or .img file";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Upload your file !</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full">
<div class="w-full h-screen flex flex-wrap justify-center items-center bg-gradient-to-b from-purple-100 to-purple-500">
    <div class="h-[80vh] rounded-md w-2/3 md:w-1/2 lg:w-1/3 bg-gray-400 flex flex-wrap justify-center content-start py-4 bg-gradient-to-b from-white to-purple-400 text-green-400">
        <?php
            if(isset($error)){ echo "<div class=\"w-2/3 bg-red-200 text-center\">" . $error . "</div>";}
            if(isset($success)){ echo "<div class=\"w-2/3 bg-lime-200 text-center\">" . $success . "</div>";}
        ?>
        <?php include('./header.php'); ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="flex flex-wrap justify-center">
            <div class="w-full flex flex-wrap justify-center my-2">
                <input type="file" name="fileToUpload" id="fileToUpload" >
            </div>
            <div class="w-full flex flex-wrap justify-center my-2">
                <input type="submit" name="submitUpload" id="sumbitUpload" class="italic underline cursor-pointer">
            </div>
        </form>
        <?php include("./footer.php"); ?>
    </div>
</div>
</body>
</html>
