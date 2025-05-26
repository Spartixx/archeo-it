<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../assets/js/alert.js"></script>

</head>

<header>
    <?php include("../components/header.php"); ?>
</header>

<body class="w-full h-screen max-h-screen bg-white">

    <?php include '../components/alert.php'; ?>

    <?php

    session_start();

    alert("Inscription réussie", "success");
    alert("Vous avez oublié un champ", "warning");
    alert("Inscription Echouée", "danger");


    ?>
</body>

</html>