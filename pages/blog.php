<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include("../components/alert.php");
include("../components/ArticleBlocks.php");
include("../utils/database/connection.php");
include("../utils/database/blog.php");

$blog_id = isset($_GET['blog_id']) ? $_GET['blog_id'] : 0;

$blogDatas = getArticleDatas($blog_id);
$blogPrimaryDatas = getCurrentBlog($blog_id);


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

    <div class="flex flex-col gap-5 justify-center items-center p-5">

        <?php

        if(isset($blogPrimaryDatas["title"])){?>
        <div class="flex flex-col gap-3 items-center p-2 rounded-xl">
            <h1 class="text-center w-full text-6xl cinzel font-bold"><?= $blogPrimaryDatas["title"] ?></h1>
        </div>
        <?php }else{ echo "Aucun titre disponible..."?>

        <?php }?>

        <div class="flex flex-col gap-10 items-center">
            <?php foreach($blogDatas as $element) {
                if($element["element_type"] == 0){?>
                    <div class="flex flex-row gap-3 items-center rounded-xl">
                        <div class="w-full">
                            <p class="text-start w-full text-m break-all"><?= $element["content"] ?></p>
                        </div>
                    </div>
                <?php } else if($element["element_type"] == 1){?>
                    <div class="flex flex-col gap-3 items-center w-fit">
                        <div class="flex flex-row gap-3 items-center w-fit">
                            <p class="text-start w-full text-3xl cinzel font-bold"><?= $element["content"] ?></p>
                        </div>
                    </div>
                <?php } else if($element["element_type"] == 2){?>
                    <div class="flex flex-col gap-3 items-center w-fit">
                        <div class="flex flex-row gap-3 items-center w-fit">
                            <img class="rounded-xl" src="../assets/img/userUploads/<?= $element["content"] ?>" alt="">
                        </div>
                    </div>
                <?php }
            } ?>
        </div>

</body>
</html>