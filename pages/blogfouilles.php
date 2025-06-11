<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Les différents types d'archéologie</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../assets/js/alert.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
<header>
    <?php include("../components/header.php"); ?>
    <?php include("../components/alert.php"); ?>
</header>

<div class="flex flex-col p-5 gap-5 ">
    <div class="mb-4 flex justify-center items-center">
        <button class="bg-yellow-950/40 text-black px-6 py-2 rounded-full font-semibold text-3xl">
            Les différents types d'archéologie
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <!-- Bloc 1 -->
        <div class="bg-yellow-950/40 text-black rounded-xl p-4 flex flex-col items-center overflow-hidden">
            <img src="https://lescrassees.saint-dizier.fr/wp-content/uploads/2021/07/2_Colin_2012-1024x768.jpg"
                 alt="Fouille programmée"
                 class="w-full h-120 object-cover rounded-xl mb-4">
            <h2 class="text-2xl font-bold text-center bg-yellow-950/40 text-white">Une fouille programmée</h2>
            <p class="text-sm text-center mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <!-- Bloc 2 -->
        <div class="bg-yellow-950/40 text-black  rounded-xl p-4 flex flex-col items-center overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/La_Salle-Fouille_en_cours_aux_Fossottes.jpg/800px-La_Salle-Fouille_en_cours_aux_Fossottes.jpg"
                 alt="Fouille programmée"
                 class="w-full h-120 object-cover rounded-xl mb-4">
            <h2 class="text-2xl font-bold text-center bg-yellow-950/40 text-white">Une fouille préventive</h2>
            <p class="text-sm text-center mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>

    <div class="bg-yellow-950/40 text-black rounded-xl p-4 flex flex-col items-center overflow-hidden">
        <h2 class="text-2xl font-bold text-center bg-yellow-950/40 text-white">En savoir plus</h2>
        <p class="text-sm text-center mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>
<?php include("../components/footer.php"); ?>
</body>
</html>
