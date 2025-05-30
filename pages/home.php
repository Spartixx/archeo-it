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
</header>


<body>


    <div class="flex flex-col gap-[7rem] justify-between p-5">

        <div class="flex flex-col gap-5 justify-center items-center mt-15 w-full">
            <h2 class="md:text-4xl lg:text-6xl sm:text-3xl text-2xl cinzel font-bold ">Explorez les Échos du Passé</h2>
            <p class="md:text-lg lg:text-xl sm:text-sm text-md text-gray-500 font-semibold text-center">Plongez dans le monde fascinant de l'archéologie, découvrez des civilisations perdues et révélez les secrets enfouis de l'histoire.</p>
            <button class="bg-yellow-950 flex flex-row items-center gap-2 p-2 px-7 text-white rounded-lg text-lg mt-6 transition hover:scale-105 hover:bg-yellow-950/90 duration:200">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-5 w-5">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                Commencer l'Exploration
            </button>
        </div>

        <div class="px-6">
            <div class="w-full h-fit flex flex-col justify-start items-center gap-10 h-100 rounded-xl border-1">
                <div class="w-full flex flex-col gap-5 justify-start items-center ">

                    <div class="w-full h-20 rounded-xl flex flex-row justify-between">

                        <button class="flex flex-row items-center justify-center rounded-b-3xl rounded-tr-[0] border-1 border-t-0 border-l-0 sm:text-sm md:text-lg p-2 w-full bg-yellow-950/40 rounded-lg text-black transition hover:bg-yellow-950 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-5 w-5">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                            Articles de Blog
                        </button>

                        <button class="flex flex-row items-center justify-center rounded-b-3xl rounded-tl-[0] border-1 border-t-0 border-l-0 border-r-0 sm:text-sm md:text-lg p-2 w-full bg-yellow-950/40 rounded-lg text-black transition hover:bg-yellow-950 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-5 w-5">
                                <line x1="3" x2="21" y1="22" y2="22"></line>
                                <line x1="6" x2="6" y1="18" y2="11"></line>
                                <line x1="10" x2="10" y1="18" y2="11"></line>
                                <line x1="14" x2="14" y1="18" y2="11"></line>
                                <line x1="18" x2="18" y1="18" y2="11"></line>
                                <polygon points="12 2 20 7 4 7"></polygon>
                            </svg>
                            Nos chantiers
                        </button>

                    </div>

                </div>

                <h3 class="md:text-2xl lg:text-4xl sm:text-xl text-xl cinzel font-semibold">Nos dernières publications</h3>

                <div class="flex flex-row justify-around flex-wrap w-full gap-5 p-3">
                    <div class="max-w-sm rounded-xl overflow-hidden shadow-lg bg-white">
                        <img class="w-full" src="../assets/img/archeoBodyBackground.jpg" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                            <p class="text-gray-700 text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                        </div>
                    </div>

                    <div>
                        <div class="max-w-sm rounded-xl overflow-hidden shadow-lg bg-white">
                            <img class="w-full" src="../assets/img/archeoBodyBackground.jpg" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                                <p class="text-gray-700 text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="max-w-sm rounded-xl overflow-hidden shadow-lg bg-white">
                            <img class="w-full" src="../assets/img/archeoBodyBackground.jpg" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                                <p class="text-gray-700 text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                            </div>
                        </div>
                    </div>
                </div>

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