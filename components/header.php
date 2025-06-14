<nav class="border-b-2 bg-yellow-950/40 border-gray-200">


    <div class="px-4">
        <div class="relative flex flex-row h-20 items-center justify-between">

            <a id="homeBtn" class="flex flex-row gap-3 items-center p-2 pr-3 rounded-xl bg-white hover:bg-yellow-950 transition hover:scale-105 text-black hover:text-white" href="../pages/home.php">
                    <svg id="homeIconSvg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-foreground/80">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>

                    <h2 class="md:text-xl sm:text-lg text-lg">Accueil</h2>
            </a>

            <div class="absolute left-1/2 transform -translate-x-1/2 w-max">
                <h1 class="text-black md:text-3xl lg:text-4xl sm:text-2xl text-2xl font-bold pr-[1rem] pointer-events-none cinzel ">Archeo-it</h1>
            </div>

            <div class="flex flex-row gap-4 w-fit">
                <?php if(isset($_SESSION["user"]["admin"]) && $_SESSION["user"]["admin"] == 1) { ?>
                    <a class="flex items-center pr-[1rem] p-2 bg-white rounded-xl hover:bg-yellow-950 transition hover:scale-105 text-black hover:text-white" href="../pages/blogCreation.php?type=0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                            <polyline points="10 17 15 12 10 7"></polyline>
                            <line x1="15" x2="3" y1="12" y2="12"></line>
                        </svg>

                        <h2 class="md:text-xl sm:text-lg text-lg">Créer un blog</h2>
                    </a>
                <?php }?>

                <?php if(isset($_SESSION["user"]["admin"]) && $_SESSION["user"]["admin"] == 1) { ?>
                    <a class="flex items-center pr-[1rem] p-2 bg-white rounded-xl hover:bg-yellow-950 transition hover:scale-105 text-black hover:text-white" href="../pages/blogCreation.php?type=1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                            <polyline points="10 17 15 12 10 7"></polyline>
                            <line x1="15" x2="3" y1="12" y2="12"></line>
                        </svg>

                        <h2 class="md:text-xl sm:text-lg text-lg">Créer un chantier</h2>
                    </a>
                <?php }?>

                <a class="flex items-center pr-[1rem] p-2 bg-white rounded-xl hover:bg-yellow-950 transition hover:scale-105 text-black hover:text-white" href="../pages/<?= isset($_SESSION["user"]["id"]) ? "dashboard.php" : "login.php" ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" x2="3" y1="12" y2="12"></line>
                    </svg>

                    <h2 class="md:text-xl sm:text-lg text-lg"><?= isset($_SESSION["user"]) && $_SESSION["user"] != [] ? "Profil" : "Connexion" ?></h2>
                </a>
            </div>


        </div>
    </div>

</nav>




