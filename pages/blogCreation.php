<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include("../components/alert.php");
include("../components/ArticleBlocks.php");
include("../utils/database/connection.php");
include("../utils/database/blog.php");

$blog_id = isset($_GET['blog_id']) ? $_GET['blog_id'] : 0;
$bypassPendings = isset($_GET['bypass']);

$blogDatas = getArticleDatas($blog_id);
$totalElements = count($blogDatas);


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

<header>
    <?php include("../components/header.php"); ?>



</header>


<body>


<div class="flex flex-col gap-[7rem] justify-between p-5">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST["removeBlogBtn"])){
                $blogToRemove = (int)$_POST["removeBlogBtn"];
                removeBlog($blogToRemove);
            }

            if(isset($_POST["tempParagraph"])){
                $content = isset($_POST["paragraphTemp"]) ? $_POST["paragraphTemp"] : "";
                if(strlen($content) < 100){
                    alert("Veuillez entrer au moins 100 caractère pour créer un paragraphe !", "warning");
                }else{
                    insertText($content, (int)$blog_id, (int)$_POST["tempParagraph"]);
                }

            }

            if(isset($_POST["sendTitleBtn"])){
                $title = isset($_POST["tempTitle"]) ? $_POST["tempTitle"] : "";
                if(strlen($title) < 4){
                    alert("Veuillez entrer au moins 4 caractère pour créer un paragraphe !", "warning");
                }else{
                    updateTitle($title, (int)$blog_id);
                }
            }

            if(isset($_POST["textDownBtn"])){
                $elementPosition = $_POST["textDownBtn"];
                if((int)$elementPosition >= $totalElements){
                    alert("Cet élément déjà au plus bas possible !", "warning");
                }else{
                    moveElement($elementPosition, "down");
                    header("Location: ./blogCreation.php?blog_id=".$blog_id);
                }
            }

            if(isset($_POST["textUpBtn"])){
                $elementPosition = $_POST["textUpBtn"];
                if((int)$elementPosition <= 1){
                    alert("Cet élément déjà au plus haut possible !", "warning");
                }else{
                    moveElement($elementPosition, "up");
                    header("Location: ./blogCreation.php?blog_id=".$blog_id);
                }
            }
        }
    ?>

    <?php if($blog_id == 0 && isset($_SESSION["user"]["admin"]) && $_SESSION["user"]["admin"] == 1 && !$bypassPendings) {
        $pendingBlog = getPendingBlog($_SESSION["user"]["id"]);
        if($pendingBlog != false) {?>
            <form method="post" class="flex flex-col gap-5 w-full items-center">
                <h2 class="cinzel text-4xl">Vous avez déjà un ou plusieurs blog en cours de création :</h2>

                <div class="w-fit h-fit bg-white flex flex-row gap-3">


                    <?php foreach($pendingBlog as $blog) { ?>

                        <div class="w-fit h-fit flex flex-col gap-3 p-2 bg-yellow-950/30 justify-between rounded-xl">
                            <h3 class="text-3xl font-regular text-black text-center min-w-[15rem]"><?= isset($blog["title"]) ? $blog["title"] : "titre non définit" ?></h3>

                            <div class="flex flex-col gap-3">
                                <a href="blogCreation.php?blog_id=<?= $blog['id'] ?>" class="bg-green-700 rounded-3xl text-2xl p-2 px-4 text-white text-center">Modifier</a>
                                <button type="submit" name="removeBlogBtn" id="removeBlogBtn<?= $blog["id"] ?>" value="<?= $blog["id"] ?>" class="bg-red-700 rounded-3xl text-2xl p-2 px-4 text-white text-center">Supprimer</button>
                            </div>

                            <p><?= isset($blog["creation_date"]) ? $blog["creation_date"] : "Date indisponible" ?></p>
                        </div>

                    <?php }?>
                </div>

                <div>
                    <a href="blogCreation.php?bypass=1" id="createNewBlog" class="p-3 bg-green-700 text-3xl rounded-xl text-white">Ignorer et créer un nouveau blog</a>
                </div>
            </form>

        <?php }else{
            $blogId = insertBlog($_SESSION["user"]["id"]);
            header("Location: blogCreation.php?blog_id=".$blogId);
        }


    }else if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){?>
    <form method="post" class="flex flex-col gap-10 mt-5">

        <?php

        if(isset($blogDatas[0]["title"])){?>
            <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
                <h1 class="text-center w-full text-4xl cinzel"><?= $blogDatas[0]["title"] ?></h1>
            </div>
        <?php }else{?>
            <form >
                <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
                    <input type="text" name="tempTitle" placeholder="Entrez votre titre" class="text-center w-full text-4xl cinzel">

                    <div class="flex flex-row gap-5">
                        <button type="submit" name="sendTitleBtn" class="bg-green-700 rounded-3xl text-2xl p-2 text-white">Valider</button>
                        <button type="submit" class="bg-red-700 rounded-3xl text-2xl p-2 text-white">Supprimer</button>
                    </div>
                </div>
            </form>
        <?php }

        foreach($blogDatas as $element) {
           if($element["element_type"] == 0){?>
               <div class="flex flex-row gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
                   <div class="w-full">
                       <p class="text-start w-full text-m"><?= $element["content"] ?></p>
                   </div>

                   <div class="w-fit flex flex-col gap-3 justify-center items-center">
                       <button type="submit" name="textUpBtn" value="<?= $element["position"] ?>">
                           <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z"/></svg>
                       </button>
                       <button type="submit" name="textDownBtn" value="<?= $element["position"] ?>">
                           <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="M440-800v487L216-537l-56 57 320 320 320-320-56-57-224 224v-487h-80Z"/></svg>
                       </button>
                   </div>
               </div>
           <?php } else if($element["element_type"] == 1){?>
               <div class="flex flex-row gap-3 items-center w-fit">
                   <p class="text-start w-full text-xl cinzel"><?= $element["content"] ?></p>

                   <div class="w-fit flex flex-col gap-3 justify-center items-center">
                       <button type="submit" name="textUpBtn" value="<?= $element["position"] ?>">
                           <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z"/></svg>
                       </button>
                       <button type="submit" name="textDownBtn" value="<?= $element["position"] ?>">
                           <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="M440-800v487L216-537l-56 57 320 320 320-320-56-57-224 224v-487h-80Z"/></svg>
                       </button>
                   </div>
               </div>
           <?php }
        } ?>

        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["blockSelection"])) {
            switch($_POST["blockSelection"]) {
                case "1":
                    $totalElements++;
                    addSubtitle();
                    break;
                case "2":
                    $totalElements++;
                    echo "paragraph added.";
                    addParagraph($totalElements);
                    break;
                case "3":
                    echo "image";
                    break;
            }
        }

        ?>

        <div class="flex flex-col flex-wrap gap-3">
            <h3 class="text-xl cinzel text-center">Séléctionnez un bloc à ajouter</h3>
            <select class="text-black border-1 border-yellow-950/30 rounded-sm p-1 bg-yellow-950/20 shadow-lg" name="blockSelection" id="blockSelection">
                <option value="1">Sous titre</option>
                <option value="2">Paragraphe</option>
                <option value="3" selected>Image</option>
            </select>
            <div class="flex flex-row w-full justify-center">
                <button type="submit" class="p-2 text-xl bg-yellow-950/50 rounded-lg px-8 w-fit text-center transition hover:bg-yellow-950/70 hover:scale-105">Ajouter un bloc</button>
            </div>

        </div>

    </form>
    <?php }else{
        header("Location:/");
    }?>



</div>
</body>
</html>