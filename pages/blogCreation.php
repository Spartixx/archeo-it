<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


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
    <?php include("../components/alert.php"); ?>
    <?php include("../components/ArticleBlocks.php"); ?>
</header>


<body>


<div class="flex flex-col gap-[7rem] justify-between p-5">

    <form method="post" class="flex flex-col gap-10 mt-5">

        <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
            <input type="text" placeholder="Entrez votre titre" class="text-center w-full text-4xl cinzel">

            <div class="flex flex-row gap-5">
                <p class="bg-green-700 rounded-3xl text-2xl p-2 text-white">Valider</p>
                <p class="bg-red-700 rounded-3xl text-2xl p-2 text-white">Supprimer</p>
            </div>
        </div>

        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["blockSelection"])) {
            switch($_POST["blockSelection"]) {
                case "1":
                    addSubtitle();
                    break;
                case "2":
                    addParagraph();
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

</div>

<script src="../assets/js/blocksFixing.js"></script>
</body>
</html>