<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>À propos de nous</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>

<body class="bg-white text-gray-800">
<header>
    <?php include("../components/header.php"); ?>
</header>

<main class="px-6 py-12 flex flex-col items-center gap-12">

    <section class="text-center max-w-3xl">
        <h1 class="cinzel text-4xl md:text-5xl font-bold mb-6">À propos de notre entreprise</h1>
        <p class="text-lg text-gray-600">
            Depuis sa création, notre entreprise s’engage à explorer, préserver et partager l’héritage archéologique mondial. Nos équipes de passionnés unissent rigueur scientifique, innovation technologique et respect des cultures pour faire revivre les échos du passé.
        </p>
    </section>

    <section class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Mission -->
        <div class="bg-white border rounded-xl shadow-md p-6 flex flex-col items-center text-center">
            <img src="../assets/img/icons/missions.png" alt="Mission" class="h-16 mb-4">
            <h3 class="cinzel text-xl font-semibold mb-2">Notre mission</h3>
            <p class="text-sm text-gray-600">
                Rechercher, documenter et transmettre le patrimoine archéologique, pour l'enrichissement de la mémoire collective.
            </p>
        </div>

        <!-- Valeurs -->
        <div class="bg-white border rounded-xl shadow-md p-6 flex flex-col items-center text-center">
            <img src="../assets/img/icons/valeurs.png" alt="Valeurs" class="h-16 mb-4">
            <h3 class="cinzel text-xl font-semibold mb-2">Nos valeurs</h3>
            <p class="text-sm text-gray-600">
                Intégrité, passion, collaboration, et respect des civilisations étudiées guident chacune de nos actions.
            </p>
        </div>

        <!-- Engagement -->
        <div class="bg-white border rounded-xl shadow-md p-6 flex flex-col items-center text-center">
            <img src="../assets/img/icons/engagements.png" alt="Engagement" class="h-16 mb-4">
            <h3 class="cinzel text-xl font-semibold mb-2">Notre engagement</h3>
            <p class="text-sm text-gray-600">
                Protéger les sites archéologiques et sensibiliser le grand public à leur importance à travers des projets éducatifs.
            </p>
        </div>
    </section>

    <section class="mt-12 max-w-4xl text-center">
        <h2 class="cinzel text-3xl font-bold mb-4">Notre histoire</h2>
        <p class="text-md text-gray-700 leading-relaxed">
            Fondée en 2015 par un groupe d’archéologues passionnés, notre entreprise a commencé avec de modestes fouilles en Méditerranée.
            Au fil des années, nous avons étendu notre rayonnement international, menant des chantiers sur quatre continents, avec une attention particulière à l'inclusivité et à la rigueur scientifique.
        </p>
    </section>

</main>

<footer class="mt-20">
    <?php include("../components/footer.php"); ?>
</footer>
</body>
</html>

