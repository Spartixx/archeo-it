<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
        <div class="mb-4 flex flex-row justify-center items-center">
            <button class="bg-[#A0536A] text-white px-6 py-2 rounded-full font-semibold text-3xl">Blog</button>
        </div>



        <!-- Première ligne d'actus -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 h-72">

            <a class="bg-gray-300 rounded-xl p-4 relative overflow-hidden" href="../pages/login.php">
                <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-40 rounded-xl">
                <div class="relative z-10 flex flex-col items-center">
                    <h2 class="text-4xl font-bold text-center text-white w-fit p-1 px-3 pulse bg-yellow-900/50 rounded-xl">Chantier de Graufhtal</h2>
                    <p class="text-xl text-center bg-white/40 text-black p-2 rounded-xl mt-2">erough etsughesigyh siuhg seghesgiyts gitsliyh g</p>
                </div>
            </a>

            <a class="bg-gray-300 rounded-xl p-4 relative overflow-hidden" href="../pages/login.php">
                <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-40 rounded-xl">
                <div class="relative z-10 flex flex-col items-center">
                    <h2 class="text-4xl font-bold text-center text-white w-fit p-1 px-3 pulse bg-yellow-900/50 rounded-xl">Chantier de Graufhtal</h2>
                    <p class="text-xl text-center bg-white/40 text-black p-2 rounded-xl mt-2">erough etsughesigyh siuhg seghesgiyts gitsliyh g</p>
                </div>
            </a>

            <a class="bg-gray-300 rounded-xl p-4 relative overflow-hidden" href="../pages/login.php">
                <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-40 rounded-xl">
                <div class="relative z-10 flex flex-col items-center">
                    <h2 class="text-4xl font-bold text-center text-white w-fit p-1 px-3 pulse bg-yellow-900/50 rounded-xl">Chantier de Graufhtal</h2>
                    <p class="text-xl text-center bg-white/40 text-black p-2 rounded-xl mt-2">erough etsughesigyh siuhg seghesgiyts gitsliyh g</p>
                </div>
            </a>

        </div>
    </div>

    <div>
        <div class="mb-4 flex flex-row justify-center items-center">
            <button class="bg-[#A0536A] text-white px-6 py-2 rounded-full font-semibold text-3xl">Sites</button>
        </div>


        <!-- Deuxième ligne d'actus -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 h-72">
            <a class="bg-gray-300 rounded-xl p-4 relative overflow-hidden" href="../pages/login.php">
                <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-40 rounded-xl">
                <div class="relative z-10 flex flex-col items-center">
                    <h2 class="text-4xl font-bold text-center text-white w-fit p-1 px-3 pulse bg-yellow-900/50 rounded-xl">Chantier de Graufhtal</h2>
                    <p class="text-xl text-center bg-white/40 text-black p-2 rounded-xl mt-2">erough etsughesigyh siuhg seghesgiyts gitsliyh g</p>
                </div>
            </a>
            <a class="bg-gray-300 rounded-xl p-4 relative overflow-hidden" href="../pages/login.php">
                <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-40 rounded-xl">
                <div class="relative z-10 flex flex-col items-center">
                    <h2 class="text-4xl font-bold text-center text-white w-fit p-1 px-3 pulse bg-yellow-900/50 rounded-xl">Chantier de Graufhtal</h2>
                    <p class="text-xl text-center bg-white/40 text-black p-2 rounded-xl mt-2">erough etsughesigyh siuhg seghesgiyts gitsliyh g</p>
                </div>
            </a>
            <a class="bg-gray-300 rounded-xl p-4 relative overflow-hidden" href="../pages/login.php">
                <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-40 rounded-xl">
                <div class="relative z-10 flex flex-col items-center">
                    <h2 class="text-4xl font-bold text-center text-white w-fit p-1 px-3 pulse bg-yellow-900/50 rounded-xl">Chantier de Graufhtal</h2>
                    <p class="text-xl text-center bg-white/40 text-black p-2 rounded-xl mt-2">erough etsughesigyh siuhg seghesgiyts gitsliyh g</p>
                </div>
            </a>
        </div>
    </div>

</div>



</body>
</html>



<?php

session_start();

?>



</body>
</html>