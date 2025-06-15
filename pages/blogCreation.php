<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include("../utils/database/connection.php");
include("../utils/database/blog.php");
include("../utils/backend/log.php");


$blog_id = isset($_GET['blog_id']) ? $_GET['blog_id'] : 0;
$articleType = isset($_GET['type']) ? $_GET['type'] : 0;
$bypassPendings = isset($_GET['bypass']);
$articleName = $articleType == 0 ? "blog" : "chantier";

$blogDatas = getArticleDatas($blog_id);
$blogPrimaryDatas = getCurrentBlog($blog_id);
$totalElements = getMaxTextPosition((int)$blog_id)["total_elements"];

if ($blog_id == 0 && isset($_SESSION["user"]["admin"]) && $_SESSION["user"]["admin"] == 1) {
    $pendingBlog = getPendingBlog($_SESSION["user"]["id"], htmlspecialchars($articleType));

    if ($bypassPendings || count($pendingBlog) == 0) {
        $blogId = insertBlog($_SESSION["user"]["id"], htmlspecialchars($articleType));
        write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") crée le blog d'id : $blogId","articleUpdate");
        header("Location: blogCreation.php?blog_id=".$blogId."&type=".$articleType);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["removeBlogBtn"])) {
        $blogToRemove = (int)$_POST["removeBlogBtn"];
        removeBlog($blogToRemove);
        write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") supprime le $articleName d'id $blogToRemove", "articleUpdate");
        header("location: ./blogCreation.php?type=$articleType");
    }

    if (isset($_POST["tempParagraph"])) {
        if (isset($_POST["paragraphTemp"])) {
            $content = $_POST["paragraphTemp"];
            if (strlen($content) < 100) {
                alert("Veuillez entrer au moins 100 caractère pour créer un paragraphe !", "warning");
            } else {
                insertText(htmlspecialchars($content), htmlspecialchars((int)$blog_id), htmlspecialchars((int)$_POST["tempParagraph"]), htmlspecialchars($articleType));
                write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") ajoute un paragraphe au $articleName d'id : $blog_id en position : ".$_POST["tempParagraph"], "articleUpdate");
                header("Location: ./blogCreation.php?blog_id=" . $blog_id);
            }

        } else if (isset($_POST["subtitleTemp"])) {
            echo "oui";
            $content = $_POST["subtitleTemp"];
            if (strlen($content) < 20) {
                alert("Veuillez entrer au moins 100 caractère pour créer un paragraphe !", "warning");
            } else {
                insertText(htmlspecialchars($content), htmlspecialchars((int)$blog_id), htmlspecialchars((int)$_POST["tempParagraph"]), htmlspecialchars($articleType), 1);
                write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") ajoute un sous-titre au $articleName d'id : $blog_id en position : ".$_POST["tempParagraph"], "articleUpdate");
                header("Location: ./blogCreation.php?blog_id=" . $blog_id);
            }

        }
        if (isset($_FILES["imageTemp"])) {
            $imgName = count(scandir("../assets/img/userUploads"));
            move_uploaded_file($_FILES["imageTemp"]["tmp_name"], "../assets/img/userUploads/" . $imgName);
            insertText(htmlspecialchars($imgName), htmlspecialchars((int)$blog_id), htmlspecialchars((int)$_POST["tempParagraph"]), htmlspecialchars($articleType), 2);
            write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") ajoute une image au $articleName d'id : $blog_id en position : ".$_POST["tempParagraph"], "articleUpdate");
        }

    }


    if (isset($_POST["sendTitleBtn"])) {
        $title = isset($_POST["tempTitle"]) ? $_POST["tempTitle"] : "";
        if (strlen($title) < 4) {
            alert("Veuillez entrer au moins 4 caractère pour créer un paragraphe !", "warning");
        } else {
            updateTitle(htmlspecialchars($title), (int)$blog_id);
            write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") modifie le titre du $articleName d'id : $blog_id", "articleUpdate");
            header("Location: ./blogCreation.php?blog_id=" . $blog_id);
        }
    }


    if (isset($_POST["sendDescriptionBtn"])) {
        $title = isset($_POST["tempDescription"]) ? $_POST["tempDescription"] : "";
        if (strlen($title) > 255) {
            alert("Veuillez entrer 255 caractères maximum pour créer une description !", "warning");
        } else {
            updateDescription(htmlspecialchars($title), (int)$blog_id);
            write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") modifie la description du $articleName d'id : $blog_id", "articleUpdate");

            header("Location: ./blogCreation.php?blog_id=" . $blog_id);
        }
    }


    if (isset($_POST["sendImageBtn"])) {
        if (isset($_FILES["tempImage"])) {
            $imgName = count(scandir("../assets/img/userUploads"));
            move_uploaded_file($_FILES["tempImage"]["tmp_name"], "../assets/img/userUploads/" . $imgName);
            updateImage(htmlspecialchars($imgName), (int)$blog_id);
            write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") modifie l'image du $articleName d'id : $blog_id", "articleUpdate");
            header("Location: ./blogCreation.php?blog_id=" . $blog_id);
        }

    }


    if (isset($_POST["textDownBtn"])) {
        $elementPosition = $_POST["textDownBtn"];
        $statusCode = moveElement($elementPosition, (int)$blog_id, $direction = "down", $articleType);
        if ($statusCode) {
            write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") descend l'élement en position $elementPosition du $articleName d'id : $blog_id", "articleUpdate");
            header("Location: ./blogCreation.php?blog_id=" . $blog_id);
        }
    }

    if (isset($_POST["textUpBtn"])) {
        $elementPosition = $_POST["textUpBtn"];
        $statusCode = moveElement($elementPosition, (int)$blog_id, $direction = "up", $articleType);
        if ($statusCode) {
            write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") monte l'élement en position $elementPosition du $articleName d'id : $blog_id", "articleUpdate");
            header("Location: ./blogCreation.php?blog_id=" . $blog_id);
        }
    }

    if (isset($_POST["deleteTextBtn"])) {
        $textId = $_POST["deleteTextBtn"];
        removeText($textId);
        write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") retire l'élement d'id : $textId du $articleName d'id : $blog_id", "articleUpdate");
        header("Location: ./blogCreation.php?blog_id=" . $blog_id);
    }

    if (isset($_POST["editTitle"])) {
        updateTitle(null, (int)$blog_id);
        write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") rénitialise le titre du $articleName d'id : $blog_id", "articleUpdate");
        header("Location: ./blogCreation.php?blog_id=" . $blog_id);
    }

    if (isset($_POST["editDescription"])) {
        updateDescription(null, (int)$blog_id);
        write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") rénitialise la description du $articleName d'id : $blog_id", "articleUpdate");
        header("Location: ./blogCreation.php?blog_id=" . $blog_id);
    }

    if (isset($_POST["editImage"])) {
        updateImage(null, (int)$blog_id);
        write_log($_SESSION["user"]["username"]." (id: ".$_SESSION["user"]["id"].") rénitialise l'image du $articleName d'id : $blog_id", "articleUpdate");
        unlink("../assets/img/userUploads/" .$_POST["editImage"]);
        header("Location: ./blogCreation.php?blog_id=" . $blog_id);
    }
}



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

    <?php include("../components/header.php");
    include("../components/ArticleBlocks.php");?>



<div class="flex flex-col gap-[7rem] justify-between p-5">

    <?php if($blog_id == 0 && isset($_SESSION["user"]["admin"]) && $_SESSION["user"]["admin"] == 1) {

        $pendingBlog = getPendingBlog($_SESSION["user"]["id"], $articleType);
        if($pendingBlog && !$bypassPendings) {?>
            <form method="post" class="flex flex-col gap-5 w-full items-center" enctype="multipart/form-data">
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
                    <a href="blogCreation.php?bypass=1&type=<?= $articleType ?>" id="createNewBlog" class="p-3 bg-green-700 text-3xl rounded-xl text-white">Ignorer et créer un nouveau blog</a>
                </div>
            </form>

        <?php }


    }else if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){?>
        <form method="post" class="flex flex-col gap-10 mt-5 items-center" enctype="multipart/form-data">

            <?php if(isset($blogPrimaryDatas["title"])){?>
                <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
                    <h1 class="text-center w-full text-4xl cinzel"><?= $blogPrimaryDatas["title"] ?></h1>
                    <button type="submit" name="editTitle" class="bg-yellow-800/75 rounded-3xl text-2xl p-2 text-white">Modifier</button>
                </div>

            <?php }else{?>
                <div >
                    <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
                        <input type="text" name="tempTitle" placeholder="Entrez votre titre" class="text-center w-full text-4xl cinzel">
                        <div class="flex flex-row gap-5">
                            <button type="submit" name="sendTitleBtn" class="bg-green-700 rounded-3xl text-2xl p-2 text-white">Valider</button>
                        </div>
                    </div>
                </div>
            <?php }

            if(isset($blogPrimaryDatas["description"])){?>
            <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
                <h2 class="text-center w-full text-2xl w-full"><?= $blogPrimaryDatas["description"] ?></h2>
                <button type="submit" name="editDescription" class="bg-yellow-800/75 rounded-3xl text-2xl p-2 text-white">Modifier</button>
            </div>

            <?php }else{?>
            <div class="w-full">
                <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl w-full">
                    <input type="text" name="tempDescription" placeholder="Entrez votre description (255 caractère maximum)" class="text-center w-full text-2xl">
                    <div class="flex flex-row gap-5">
                        <button type="submit" name="sendDescriptionBtn" class="bg-green-700 rounded-3xl text-2xl p-2 text-white">Valider</button>
                    </div>
                </div>
            </div>
            <?php }

            if(isset($blogPrimaryDatas["image"])){?>
                <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
                    <p class="text-center w-full text-2xl w-full">Image du blog :</p>
                    <img src="../assets/img/userUploads/<?= $blogPrimaryDatas["image"] ?>" class="rounded-xl" alt="">
                    <button type="submit" name="editImage" value="<?= $blogPrimaryDatas["image"] ?>" class="bg-yellow-800/75 rounded-3xl text-2xl p-2 text-white">Modifier</button>
                </div>

            <?php }else{?>
                <div  class="flex flex-row justify-center">
                    <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl w-fit">
                        <p class="text-center text-2xl">Entrez l'image du blog :</p>
                        <input type="file" name="tempImage" class="text-l bg-white rounded-xl p-2 h-20">
                        <div class="flex flex-row gap-5">
                            <button type="submit" name="sendImageBtn" class="bg-green-700 rounded-3xl text-2xl p-2 text-white">Valider</button>
                        </div>
                    </div>
                </div>
            <?php }


            foreach($blogDatas as $element) {
                if($element["element_type"] == 0){?>
                    <div class="flex flex-col gap-1">
                        <div class="flex flex-row gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
                            <div class="w-full">
                                <p class="text-start w-full text-m break-all"><?= $element["content"] ?></p>
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

                        <button type="submit" name="deleteTextBtn" value="<?= $element["id"] ?>" class="bg-red-800/75 rounded-3xl text-2xl p-2 text-white">Supprimer</button>
                    </div>

                <?php } else if($element["element_type"] == 1){?>
                    <div class="flex flex-col gap-1 w-fit">
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

                        <button type="submit" name="deleteTextBtn" value="<?= $element["id"] ?>" class="bg-red-800/75 rounded-3xl text-2xl p-2 text-white">Supprimer</button>

                    </div>
                <?php } else if($element["element_type"] == 2){?>
                    <div class="flex flex-col gap-1 w-fit">
                        <div class="flex flex-row gap-3 items-center w-fit">
                            <img class="rounded-xl" src="../assets/img/userUploads/<?= $element["content"] ?>" alt="">
        
                            <div class="w-fit flex flex-col gap-3 justify-center items-center">
                                <button type="submit" name="textUpBtn" value="<?= $element["position"] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z"/></svg>
                                </button>
                                <button type="submit" name="textDownBtn" value="<?= $element["position"] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="M440-800v487L216-537l-56 57 320 320 320-320-56-57-224 224v-487h-80Z"/></svg>
                                </button>
                            </div>
                        </div>
        
                        <button type="submit" name="deleteTextBtn" value="<?= $element["id"] ?>" class="bg-red-800/75 rounded-3xl text-2xl p-2 text-white">Supprimer</button>
        
                    </div>
                <?php }
            }

            if(isset($_POST["blockSelection"])) {
                switch($_POST["blockSelection"]) {
                    case "1":
                        $totalElements++;
                        addSubtitle($totalElements);
                        break;
                    case "2":
                        $totalElements++;
                        addParagraph($totalElements);
                        break;
                    case "3":
                        $totalElements++;
                        addImage($totalElements);
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
        header("location: /");
    }?>



</div>
</body>
</html>