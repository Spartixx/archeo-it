<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$articleType = isset($_GET['type']) ? $_GET['type'] : 0;
$articleTypeName = $articleType == 1 ? "chantier" : "blog";

include("../components/alert.php");
include("../components/ArticleBlocks.php");
include("../utils/database/connection.php");
include("../utils/database/blog.php");
?>


<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../assets/js/alert.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

</head>



<body>

    <header>
        <?php include("../components/header.php"); ?>
    </header>

    <div class="flex flex-wrap h-fit gap-5 justify-center items-center p-5">

        <?php foreach(getBlogsDatas($articleType) as $blog):
            if(isset($blog["title"])){

                $blogDatas = getCurrentBlog($blog["id"]);

                ?>
                <div class="h-full">
                    <div class="max-w-sm rounded-xl overflow-hidden shadow-lg bg-white h-full">
                        <img class="w-full" src="<?= isset($blogDatas["image"]) ? "../assets/img/userUploads/".$blogDatas["image"] : "../assets/img/archeoBodyBackground.jpg" ?>" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2"><?= $blogDatas["title"] ?></div>
                            <p class="text-gray-700 text-base h-20">
                                <?= isset($blogDatas["description"]) ? $blogDatas["description"] : "Aucune description pour ce $articleTypeName." ?>
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                        </div>
                    </div>
                </div>

        <?php }endforeach;?>

</body>
</html>