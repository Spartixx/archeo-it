<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Chantier</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../assets/js/alert.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">

</head>

<header>
    <?php include("../components/header.php"); ?>
    <?php include("../components/alert.php"); ?>
</header>


<body>

<div class="flex flex-col p-5 gap-5">

    <div>

    <div>
        <div class="mb-4 flex flex-row justify-center items-center">
            <button class="bg-[#A0536A] text-white px-6 py-2 rounded-full font-semibold text-3xl">Chantier de Graufhtal</button>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">

            <div class="bg-gray-300 rounded-xl p-4 flex flex-col items-center overflow-hidden">
                <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg"
                     alt="Actu 1"
                     class="w-full h-120 object-cover rounded-xl mb-4">
                <h2 class="text-2xl font-bold text-center text-[#A0536A]">Une fouille programmée</h2>
                <p class="text-sm text-center mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>


            <div class="bg-gray-300 rounded-xl p-4 flex flex-col items-center overflow-hidden">
                <img src="https://www.francebleu.fr/s3/cruiser-production/2022/07/3c0acc83-e127-4430-8b1a-84c538b99bdc/1200x680_img-20220704-wa0011.webp"
                     alt="Actu 2"
                     class="w-full h-120 object-cover rounded-xl mb-4">
                <h2 class="text-2xl font-bold text-center text-[#A0536A]">Les vestiges d'une abbaye</h2>
                <p class="text-sm text-center mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>


            <div class="bg-gray-300 rounded-xl p-4 flex flex-col items-center overflow-hidden">
                <img src="https://www.francebleu.fr/s3/cruiser-production/2022/07/5a481059-d315-4222-91c2-2a4339910c7c/600_img-20220704-wa0007.webp"
                     alt="Actu 3"
                     class="w-full h-120 object-cover rounded-xl mb-4">
                <h2 class="text-2xl font-bold text-center text-[#A0536A]">Retrouver des vestiges du Moyen-âge</h2>
                <p class="text-sm text-center mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

    </div>
        <div class="bg-gray-300 rounded-xl p-4 flex flex-col items-center overflow-hidden">
            <h2 class="text-2xl font-bold text-center text-[#A0536A]">En savoir plus sur le chantier</h2>
            <p class="text-sm text-center mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
</div>


    <?php include("../components/footer.php"); ?>
</body>
</html>



<?php

session_start();

?>



</html>
