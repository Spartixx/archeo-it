<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../components/alert.php';
include '../utils/backend/login.php';

session_start();

if(isset($_SESSION["user"]) && $_SESSION["user"] != []){
    header("location: ./home.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
    if(isset($_POST["sendLoginBtn"])){
        checkLoginInputs($_POST);


    }else if(isset($_POST["sendRegisterBtn"])) {
        checkRegisterInputs($_POST);

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../assets/js/alert.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">

</head>

<header>
    <?php include("../components/header.php"); ?>
</header>

<body class="w-full h-screen max-h-screen bg-white">


   <div class="w-full flex flex-row flex-wrap gap-15 justify-center items-start p-8 mt-3">
       <form class="w-auto h-fit border-2 rounded-2xl flex flex-col justify-center items-center gap-4 p-4" method="post">

           <img class="w-25 h-25 rounded-2xl" src="../assets/img/logo-archeo-it.png" alt="logo">

           <h2 class="text-yellow-950 font-bold text-xl md:text-3xl m-2">Connectez vous à votre compte</h2>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-950" >Email</h3>
               <input name="loginMailInput" class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre addresse E-mail" id="loginMailInput">
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-950" >Mot de passe</h3>
               <input name="loginPasswordInput" class="border-2 rounded-2xl p-3 w-full" type="password" placeholder="Votre mot de passe" id="loginPasswordInput">
           </div>

           <button name="sendLoginBtn" class="mt-5 rounded-2xl p-3 w-full bg-yellow-950 text-white transition hover:scale-105" id="sendLoginBtn" type="submit">Envoyer</button>

       </form>

       <form class="w-auto h-fit border-2 rounded-2xl flex flex-col justify-center items-center gap-4 p-4" method="post">

           <img class="w-25 h-25 rounded-2xl" src="../assets/img/logo-archeo-it.png" alt="logo">

           <h2 class="text-yellow-950 font-bold text-2xl md:text-3xl m-2">Créez un nouveau compte</h2>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-950" >Nom d'utilisateur</h3>
               <input name="RegisterUsernameInput" class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre nom d'utilisateur" id="registerNameInput">
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-950" >Email</h3>
               <input name="registerMailInput" class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre addresse E-mail" id="registerMailInput">
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-950" >Mot de passe</h3>
               <div class="flex flex-row items-center justify-end w-full">
                   <input name="passwordRegisterInput" class="border-2 rounded-2xl p-3 w-full" id="passwordRegisterInput" type="password" placeholder="Votre mot de passe">
                   <img id="passwordView" class="w-10 h-10 absolute mr-1" src="../assets/img/icons/hidePassword.webp" alt="passwordHided">
               </div>
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-950" >Confirmation</h3>
               <div class="flex flex-row items-center justify-end w-full">
                   <input name="passwordConfirmInput" id="passwordConfirmInput" class="border-2 rounded-2xl p-3 w-full" type="password" placeholder="Confirmez votre mot de passe">
                   <img id="passwordConfirmView" class="w-10 h-10 absolute mr-1" src="../assets/img/icons/hidePassword.webp" alt="passwordHided">
               </div>

               <button type="button" name="generatePasswordBtn" class="underline ml-1 mt-1 transition hover:scale-105" id="generatePasswordBtn">Générer un mot de passe</button>


           </div>

           <button name="sendRegisterBtn" class="mt-5 rounded-2xl p-3 w-full bg-yellow-950 text-white transition hover:scale-105" id="sendRegisterBtn" type="submit">Envoyer</button>

       </form>
   </div>


<div class="fixed inset-0 bg-gray-500/75 transition-opacity passwordGenerationDiv" aria-hidden="true" hidden></div>

<div class=" fixed inset-0 z-10 w-screen passwordGenerationDiv" hidden>
    <div class="flex flex-row min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0 ">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg bg-white">
            <div class="px-4 pt-5 sm:p-6 sm:pb-4 relative z-10 bg-white">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class=" text-2xl font-semibold text-black font-bold" id="modal-title">Choisissez vos paramètres</h3>
                        <div class="mt-2 flex flex-col items-start">
                            <p class="text-l text-black font-semibold" >Taille de mot de passe</p>
                            <input class="border-1 rounded-sm border-black pr-1 text-black" id="passwordSizeInput" value="12" type="number">
                        </div>

                        <div class="mt-2 flex flex-col items-start">
                            <p class="text-l text-black font-semibold" >Sécurité du mot de passe</p>
                            <select class="text-black border-1 border-black rounded-sm p-1" name="passwordModeSelection" id="passwordModeSelection">
                                <option value="1">Alphabétique seulement</option>
                                <option value="2">Alphabétique et numérique</option>
                                <option value="3" selected>Alphabétique, numérique et caractères spéciaux.</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="mt-4 border-t-1 border-black pt-3 px-4 pb-3 md:pb-0 sm:flex sm:flex-row-reverse sm:px-6 z-2">
                    <button type="button" id="passwordGenerationBtn" class="opacity-80 transition hover:scale-110 inline-flex w-full justify-center rounded-md bg-yellow-950 text-white px-3 py-2 text-sm font-semibold text-black shadow-xs sm:ml-3 sm:w-auto">Générer</button>
                    <button type="button" id="passwordGenerationCancel" class="opacity-80 transition hover:scale-110 mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Fermer</button>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

</body>
<script type="module" src="../assets/js/passwordGenerationApi.js"></script>
<script type="module" src="../assets/js/modals.js"></script>
<script type="module" src="../assets/js/passwordView.js"></script>
</html>