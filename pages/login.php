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

   <div class="w-full flex flex-row flex-wrap gap-15 justify-center items-center p-8" >
       <div class="w-auto h-fit border-2 rounded-2xl flex flex-col justify-center items-center gap-4 p-4 transition hover:sm:scale-105 transition lg:hover:scale-110 transition hover:scale-105">

           <img class="w-25 h-25 rounded-2xl" src="../assets/img/logo-archeo-it.png" alt="logo">

           <h2 class="text-yellow-950 font-bold text-xl md:text-3xl m-2">Connectez vous à votre compte</h2>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Email</h3>
               <input class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre addresse E-mail">
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Mot de passe</h3>
               <input class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre mot de passe">
           </div>

           <button class="mt-5 rounded-2xl p-3 w-full bg-yellow-950 text-white" >Envoyer</button>

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
               <input class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Votre mot de passe">
           </div>

           <div class="flex flex-col items-start w-full">
               <h3 class="font-bold text-2xl rounded-2xl text-yellow-900" >Confirmation</h3>
               <input class="border-2 rounded-2xl p-3 w-full" type="text" placeholder="Confirmez votre mot de passe">
           </div>

       </div>
   </div>

</body>

</html>