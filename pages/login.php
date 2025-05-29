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

<?php include '../components/alert.php'; ?>

<?php

    session_start();

?>

   <div class="w-full flex flex-row flex-wrap gap-15 justify-center items-center p-8 mt-3" >
       <div class="w-auto h-fit border-2 rounded-2xl flex flex-col justify-center items-center gap-4 p-4 transition hover:sm:scale-105 transition lg:hover:scale-110 transition hover:scale-105">

           <img class="w-25 h-25 rounded-2xl" src="../assets/img/logo-archeo-it.png" alt="logo">

           <h2 class="text-yellow-950 font-bold text-xl md:text-3xl m-2">Connectez vous à votre compte</h2>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Email</h3>
               <input class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre addresse E-mail" id="modeInput">
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Mot de passe</h3>
               <input class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre mot de passe" id="sizeInput">
           </div>

           <button class="mt-5 rounded-2xl p-3 w-full bg-yellow-950 text-white transition hover:scale-105" id="loginBtn" >Envoyer</button>

       </div>

       <div class="w-auto h-fit border-2 rounded-2xl flex flex-col justify-center items-center gap-4 p-4 transition hover:sm:scale-105 transition lg:hover:scale-110 transition hover:scale-105">

           <img class="w-25 h-25 rounded-2xl" src="../assets/img/logo-archeo-it.png" alt="logo">

           <h2 class="text-yellow-950 font-bold text-2xl md:text-3xl m-2">Créez un nouveau compte</h2>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Nom d'utilisateur</h3>
               <input class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre nom d'utilisateur">
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Email</h3>
               <input class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre addresse E-mail">
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Mot de passe</h3>
               <div class="flex flex-row items-center justify-end w-full">
                   <input class="border-2 rounded-2xl p-3 w-full" id="passwordInput" type="password" placeholder="Votre mot de passe">
                   <img id="passwordView" class="w-10 h-10 absolute mr-1" src="../assets/img/icons/hidePassword.webp" alt="passwordHided">
               </div>
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Confirmation</h3>
               <div class="flex flex-row items-center justify-end w-full">
                   <input id="passwordConfirmInput" class="border-2 rounded-2xl p-3 w-full" type="password" placeholder="Confirmez votre mot de passe">
                   <img id="passwordConfirmView" class="w-10 h-10 absolute mr-1" src="../assets/img/icons/hidePassword.webp" alt="passwordHided">
               </div>

               <button class="underline ml-1 mt-1 transition hover:scale-105" id="generatePasswordBtn">Générer un mot de passe</button>


           </div>

           <button class="mt-5 rounded-2xl p-3 w-full bg-yellow-950 text-white transition hover:scale-105" >Envoyer</button>

       </div>
   </div>


<div class="fixed inset-0 bg-gray-500/75 transition-opacity passwordGenerationDiv" aria-hidden="true" hidden></div>

<div class=" fixed inset-0 z-10 w-screen passwordGenerationDiv" hidden>
    <div class="flex flex-row min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <img class="absolute top-0 left-0 w-full h-full object-cover z-1 opacity-75" src="../assets/img/backgroundArcheo.png" alt="">
            <div class="px-4 pt-5 sm:p-6 sm:pb-4 relative z-10">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class=" text-2xl font-semibold text-white font-bold" id="modal-title">Choisissez vos paramètres</h3>
                        <div class="mt-2 flex flex-col items-start">
                            <p class="text-l text-white font-semibold" >Taille de mot de passe</p>
                            <input class="border-1 rounded-sm border-white pr-1 text-white" id="passwordSizeInput" value="12" type="number">
                        </div>

                        <div class="mt-2 flex flex-col items-start">
                            <p class="text-l text-white font-semibold" >Taille de mot de passe</p>
                            <select class="text-white border-1 border-white rounded-sm p-1" name="passwordModeSelection" id="passwordModeSelection">
                                <option value="1">Alphabétique seulement</option>
                                <option value="2">Alphabétique et numérique</option>
                                <option value="3" selected>Alphabétique, numérique et caractères spéciaux.</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="mt-4 border-t-1 border-white pt-3 px-4 pb-3 md:pb-0 sm:flex sm:flex-row-reverse sm:px-6 z-2">
                    <button type="button" id="passwordGenerationBtn" class="opacity-80 transition hover:scale-110 inline-flex w-full justify-center rounded-md bg-yellow-700 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-yellow-700 sm:ml-3 sm:w-auto">Générer</button>
                    <button type="button" id="passwordGenerationCancel" class="opacity-80 transition hover:scale-110 mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Fermer</button>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

</body>
<script type="module" src="../assets/js/test.js"></script>
<script type="module" src="../assets/js/modals.js"></script>
<script type="module" src="../assets/js/passwordView.js"></script>
</html>