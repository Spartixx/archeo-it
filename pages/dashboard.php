<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

$mode = "infos";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["InfosSelection"])){
        $mode = "infos";
    }else if(isset($_POST["AdminSelection"])){
        $mode = "admin";
    }else if(isset($_POST["logoutBtn"])){
        session_destroy();
        header("location: ./home.php");
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

<header>
    <?php include("../components/header.php"); ?>
    <?php include("../components/alert.php"); ?>
</header>


<body>


<div class="flex flex-col gap-[7rem] justify-between p-5">


    <div class="sm:px-0 md:px-3 lg:px-6 px-0">
        <div class="w-full h-fit flex flex-col justify-start items-center gap-10 h-100 rounded-xl border-1">
            <div class="w-full flex flex-col gap-5 justify-start items-center ">

                <form method="post" class="w-full h-20 rounded-xl flex flex-row justify-between">

                    <button name="InfosSelection" class="flex flex-row items-center justify-center rounded-b-3xl rounded-tr-[0] border-1 border-t-0 border-l-0 sm:text-sm md:text-lg p-2 w-full bg-yellow-950/40 rounded-lg text-black transition hover:bg-yellow-950 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-5 w-5">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                        Vos informations
                    </button>

                    <?php if($_SESSION["user"]["admin"] == 1) {?>

                        <button name="AdminSelection" type="submit" class="flex flex-row items-center justify-center rounded-b-3xl rounded-tl-[0] border-1 border-t-0 border-l-0 border-r-0 sm:text-sm md:text-lg p-2 w-full bg-yellow-950/40 rounded-lg text-black transition hover:bg-yellow-950 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-5 w-5">
                                <line x1="3" x2="21" y1="22" y2="22"></line>
                                <line x1="6" x2="6" y1="18" y2="11"></line>
                                <line x1="10" x2="10" y1="18" y2="11"></line>
                                <line x1="14" x2="14" y1="18" y2="11"></line>
                                <line x1="18" x2="18" y1="18" y2="11"></line>
                                <polygon points="12 2 20 7 4 7"></polygon>
                            </svg>
                            Panneau administrateur
                        </button>

                    <?php }?>

                </form>

            </div>

            <h3 class="md:text-2xl lg:text-4xl sm:text-xl text-xl cinzel font-semibold"><?= $mode == "infos" ? "Vos informations" : "Panneau administrateur" ?></h3>

            <?php if($mode == "infos"){ ?>

            <div class="flex flex-row flex-wrap justify-center w-full gap-5 p-3">

                <div class="flex flex-col gap-6 justify-start p-3 rounded-xl shadow-xl bg-yellow-950/60 sm:w-full md:w-full lg:w-[48%] w-full h-fit">
                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Nom d'utilisateur</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950"><?= $_SESSION["user"]["username"] ?></p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Adresse Email</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950"><?= $_SESSION["user"]["email"] ?></p>
                    </div>
                </div>

                <div class="flex flex-col gap-6 justify-start p-3 rounded-xl shadow-xl bg-yellow-950/60 sm:w-full md:w-full lg:w-[48%] w-full h-fit">
                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Date de création</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950"><?= $_SESSION["user"]["account_creation"] ?></p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Rôle</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950"><?= $_SESSION["user"]["admin"] == 0 ? "utilisateur" : "admin" ?></p>
                    </div>
                </div>

            </div>

            <?php }else{?>

            <a href="./handleMembers.php" class="p-2 px-8 text-2xl bg-yellow-950 text-white rounded-xl transition hover:bg-yellow-950/90 hover:scale-103">Gérer les membres</a>

                <div class="flex flex-row flex-wrap justify-center w-full gap-5 p-3">

                <div class="flex flex-col gap-6 justify-start p-3 rounded-xl bg-yellow-950/60 sm:w-full md:w-full lg:w-[48%] w-full h-fit">

                    <h3 class="text-3xl text-white font-semibold">Blogs</h3>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Nombre total</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950">Bientôt</p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Le plus aimé</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950">Bientôt</p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Le plus visité</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950">Bientôt</p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Le plus récent</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950">Bientôt</p>
                    </div>

                    <div class="flex flex-col gap-3 items-center">
                        <a class="text-white text-2xl p-2 px-8 bg-yellow-950/80 rounded-lg w-fit transition hover:bg-yellow-950 hover:scale-103">Liste complète</a>
                        <a class="text-white text-2xl p-2 px-8 bg-yellow-950/80 rounded-lg w-fit transition hover:bg-yellow-950 hover:scale-103">Créer un blog</a>
                    </div>
                </div>


                <div class="flex flex-col gap-6 justify-start p-3 rounded-xl bg-yellow-950/60 sm:w-full md:w-full lg:w-[48%] w-full h-fit">

                    <h3 class="text-3xl text-white font-semibold">Chantiers</h3>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Nombre total</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950">Bientôt</p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Le plus aimé</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950">Bientôt</p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Le plus visité</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950">Bientôt</p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h3 class="text-white text-2xl p-1 bg-yellow-950/30 rounded-lg">Le plus récent</h3>
                        <p class="text-white text-lg pl-1 border-b-1 pb-4 border-b-yellow-950">Bientôt</p>
                    </div>

                    <div class="flex flex-col gap-3 items-center">
                        <a class="text-white text-2xl p-2 px-8 bg-yellow-950/80 rounded-lg w-fit transition hover:bg-yellow-950 hover:scale-103">Liste complète</a>
                        <a class="text-white text-2xl p-2 px-8 bg-yellow-950/80 rounded-lg w-fit transition hover:bg-yellow-950 hover:scale-103">Créer un chantier</a>
                    </div>
                </div>

            </div>

            <?php }?>

            <form class="my-5" method="post">
                <button name="logoutBtn" type="submit" class="p-2 px-8 text-2xl bg-yellow-950 text-white rounded-xl transition hover:bg-yellow-950/90 hover:scale-103">Se déconnecter</button>
            </form>

        </div>



    </div>

</div>


</body>
</html>