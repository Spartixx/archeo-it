<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$mode = "infos";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["BlogSelection"])){
        $mode = "blog";
    }else if(isset($_POST["SiteSelection"])){
        $mode = "chantier";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../assets/js/alert.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
<header>
    <?php include("../components/header.php"); ?>
    <?php include("../components/alert.php"); ?>
    <?php include("../utils/database/connection.php"); ?>
    <?php include("../utils/database/blog.php"); ?>
</header>

<div class="flex flex-col gap-[7rem] justify-between p-5">

    <div class="flex flex-col gap-5 justify-center items-center mt-15 w-full">
        <div class="flex flex-col justify-center items-center">
            <h2 class="md:text-4xl lg:text-6xl sm:text-3xl text-2xl cinzel font-bold">Explorez les Échos du Passé</h2>
            <p class="md:text-lg lg:text-xl sm:text-sm text-md text-gray-500 font-semibold text-center">
                Plongez dans le monde fascinant de l'archéologie, découvrez des civilisations perdues et révélez les secrets enfouis de l'histoire.
            </p>
            <button class="bg-yellow-950 flex flex-row items-center gap-2 p-2 px-7 text-white rounded-lg text-lg mt-6 transition hover:scale-105 hover:bg-yellow-950/90 duration:200">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-5 w-5">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                Commencer l'Exploration
            </button>
        </div>
    </div>

    <div class="w-full h-fit flex flex-col justify-start items-center gap-10 h-100 rounded-xl border-1">
        <div class="w-full flex flex-col gap-5 justify-start items-center ">

            <form method="post" class="w-full h-20 rounded-xl flex flex-row justify-between">

                <button name="BlogSelection" class="flex flex-row items-center justify-center rounded-b-3xl rounded-tr-[0] border-1 border-t-0 border-l-0 sm:text-sm md:text-lg p-2 w-full bg-yellow-950/40 rounded-lg text-black transition hover:bg-yellow-950 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-5 w-5">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg>
                    Blogs
                </button>


                <button name="SiteSelection" type="submit" class="flex flex-row items-center justify-center rounded-b-3xl rounded-tl-[0] border-1 border-t-0 border-l-0 border-r-0 sm:text-sm md:text-lg p-2 w-full bg-yellow-950/40 rounded-lg text-black transition hover:bg-yellow-950 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-5 w-5">
                        <line x1="3" x2="21" y1="22" y2="22"></line>
                        <line x1="6" x2="6" y1="18" y2="11"></line>
                        <line x1="10" x2="10" y1="18" y2="11"></line>
                        <line x1="14" x2="14" y1="18" y2="11"></line>
                        <line x1="18" x2="18" y1="18" y2="11"></line>
                        <polygon points="12 2 20 7 4 7"></polygon>
                    </svg>
                    Chantiers
                </button>

            </form>

        </div>

        <h3 class="md:text-2xl lg:text-4xl sm:text-xl text-xl cinzel font-semibold"><?= $mode == "blog" ? "Nos derniers blogs" : "Nos derniers chantiers" ?></h3>

        <div class="flex flex-row flex-wrap justify-center gap-5 p-3 w-[100%] md:w-[75%] lg:w-[50%] rounded-xl">

            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <?php
                    $counter = 0;
                    $type = $mode == "blog" ? 0 : 1;
                    foreach (getBlogsDatas($type) as $article){
                        if(isset($article["title"]) && ($counter < 3 && !isset($_SESSION["user"])) || isset($_SESSION["user"])){
                            $counter++;
                            ?>

                            <a href="blog.php?blog_id=<?= $article["id"] ?>" class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="flex items-center justify-center h-full w-full">
                                    <div class="flex flex-col gap-3 h-fit w-fit justify-center items-center relative z-49 bg-black/60 rounded-xl p-2">
                                        <p class="text-2xl md:text-4xl font-bold text-white relative z-50 text-center"><?= $article["title"] ?></p>
                                        <p class="text-m md:text-xl  font-regular text-white relative z-50 text-center"><?= isset($article["description"]) ? $article["description"]: "Description non disponible" ?></p>
                                    </div>
                                </div>
                                <img src="<?= isset($article["image"]) ? "../assets/img/userUploads/".$article["image"] : "../assets/img/archeoBodyBackground.jpg" ?>" class="rounded-xl absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </a>

                        <?php }else{?>
                            <div class="hidden duration-700 ease-in-out bg-yellow-950/40" data-carousel-item>
                                <div class="flex items-center justify-center h-full w-full">
                                    <div class="flex flex-col gap-3 h-fit w-fit justify-center items-center relative z-49 bg-black/60 rounded-xl p-2">
                                        <a href="login.php" class="text-4xl font-bold text-white relative z-50 text-center">Inscrivez vous pour voir plus de <?= $mode ?>.</a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }?>

                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse bg-white/50 p-2 rounded-xl">
                    <?php
                    $counter = 0;
                    foreach (getBlogsDatas($type) as $article){
                        if(isset($article["title"]) && ($counter < 3 && !isset($_SESSION["user"])) || isset($_SESSION["user"])){ $counter++;?>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="<?= $counter == 0 ? "true" : "false" ?>" aria-label="Slide <?= $counter+1 ?>" data-carousel-slide-to="<?= $counter ?>"></button>
                        <?php }}?>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/50 hover:bg-white/40 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/50 hover:bg-white/40 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                </button>
            </div>

        </div>


    </div>

</div>


<!-- Chat -->
<button id="chat-toggle" class="fixed bottom-5 right-5 bg-yellow-950 text-white px-4 py-2 rounded-full shadow-lg hover:bg-yellow-900">Besoin d'aide ?</button>

<div id="chat-box" class="fixed bottom-20 right-5 bg-white w-80 h-96 border shadow-lg rounded-lg flex flex-col hidden">
    <div class="bg-yellow-950 text-white px-4 py-2 rounded-t-lg">Assistant Archéo</div>
    <div id="chat-messages" class="flex-1 p-2 overflow-y-auto text-sm"></div>
    <div class="p-2 border-t">
        <input type="text" id="chat-input" class="w-full border rounded p-1" placeholder="Posez une question..." />
    </div>
</div>


<script src="../assets/js/ChatSection.js"></script>
<?php include("../components/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
