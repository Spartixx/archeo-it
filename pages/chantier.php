<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../assets/js/alert.js"></script>

</head>

<header>
    <?php include("../components/header.php"); ?>
</header>

<body> 

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 h-72">
    <div class="bg-gray-300 rounded-xl p-4 relative overflow-hidden">
        <img src="https://www.lagazettefrance.fr/thumbs/1368×1026/articles/2023/06/AdobeStock-91200299.jpeg" alt="Actu 1" class="absolute top-0 left-0 w-full h-full object-cover opacity-50 rounded-xl">
        <div class="relative z-10">
            <h2 class="text-xl font-bold">Actu 1</h2>
            <p class="text-sm">Bréf </p>
        </div>


<?php
