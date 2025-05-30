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


<body class="bg-white">

<img class="z-1 w-full h-screen opacity-100 absolute top-0" src="../assets/img/archeoBodyBackground.jpg" alt="">

<div class="flex flex-col p-5 gap-5">

    <div>
        <div class="rounded-2xl mb-4 flex flex-row justify-center items-center relative z-10">
            <button class="bg-white/50 text-black px-6 py-2 rounded-full font-semibold text-4xl px-5">Blog</button>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 h-72">

            <?php for($i = 0; $i < 3; $i++) { ?>
                <a class="bg-gray-300 rounded-xl p-4 relative overflow-hidden z-5" href="chantier.php">
                    <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-55 rounded-xl">
                    <div class="relative z-10 flex flex-col items-center w-full">
                        <h2 class="bg-yellow-950/50 rounded-xl text-4xl font-bold text-center text-white w-fit pulse p-2 px-3">Chantier de Graufhtal</h2>
                        <div class="rounded-xl relative z-10 mt-2 p-1 w-full bg-white/40">
                            <p class="text-xl text-center text-black text-bold relative z-5">erihfe fgyergf euygf  erhbeirhger yieryuerfyuier fyuiefyher feyiurfeyur fuygefguyr fergu</p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>



    <div>
        <div class="rounded-2xl mb-4 flex flex-row justify-center items-center relative z-10">
            <button class="bg-white/50 text-black px-6 py-2 rounded-full font-semibold text-4xl px-5">Sites</button>
        </div>



        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 h-72">

            <?php for($i = 0; $i < 3; $i++) { ?>
                <a class="bg-gray-300 rounded-xl p-4 relative overflow-hidden z-5" href="chantier.php">
                    <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-55 rounded-xl">
                    <div class="relative z-10 flex flex-col items-center w-full">
                        <h2 class="bg-yellow-950/50 rounded-xl text-4xl font-bold text-center text-white w-fit pulse p-2 px-3">Chantier de Graufhtal</h2>
                        <div class="rounded-xl relative z-10 mt-2 p-1 w-full bg-white/40">
                            <p class="text-xl text-center text-black text-bold relative z-5">erihfe fgyergf euygf  erhbeirhger yieryuerfyuier fyuiefyher feyiurfeyur fuygefguyr fergu</p>
                        </div>
                    </div>
                </a>
            <?php } ?>

        </div>

    </div>




</body>
</html>



<?php

session_start();

?>



</body>

</html>