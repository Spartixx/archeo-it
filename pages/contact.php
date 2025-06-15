<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>

<body class="bg-white">
<header>
    <?php include("../components/header.php"); ?>
</header>

<main class="flex flex-col items-center justify-center px-4 py-12">
    <h1 class="text-4xl md:text-5xl font-bold cinzel mb-4 text-center">Contactez-nous</h1>
    <p class="text-gray-600 text-center mb-10 md:text-lg max-w-xl">
        Une question ? Une remarque ? Contactez notre équipe, nous vous répondrons dans les plus brefs délais.
    </p>

    <form action="traitement_contact.php" method="POST" class="w-full max-w-2xl bg-white border rounded-xl shadow-md p-6 flex flex-col gap-4">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="w-full">
                <label for="nom" class="block text-gray-700 font-semibold mb-1">Nom</label>
                <input type="text" id="nom" name="nom" required class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-yellow-950/70">
            </div>
            <div class="w-full">
                <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" id="email" name="email" required class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-yellow-950/70">
            </div>
        </div>

        <div>
            <label for="sujet" class="block text-gray-700 font-semibold mb-1">Sujet</label>
            <input type="text" id="sujet" name="sujet" required class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-yellow-950/70">
        </div>

        <div>
            <label for="message" class="block text-gray-700 font-semibold mb-1">Message</label>
            <textarea id="message" name="message" rows="5" required class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-yellow-950/70"></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-yellow-950 text-white px-6 py-2 rounded-lg hover:bg-yellow-800 transition">
                Envoyer
            </button>
        </div>
    </form>
</main>

<footer class="mt-20">
    <?php include("../components/footer.php"); ?>
</footer>
</body>
</html>

