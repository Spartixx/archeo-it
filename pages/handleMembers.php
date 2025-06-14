<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

include("../utils/database/connection.php");
include("../utils/database/user.php");

$startLimit = 6;
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$totalUsers = getTotalUser()["totalUser"];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["editNameBtn"]) && isset($_POST["newNameInput"])){
        updateName((int)$_POST["editNameBtn"], $_POST["newNameInput"]);
    }

    if(isset($_POST["editRoleBtn"]) && isset($_POST["newRoleInput"])){
        if($_POST["newRoleInput"] == "admin"){
            updateRole($_POST["editRoleBtn"], 1);
        }else if($_POST["newRoleInput"] == "member"){
            updateRole($_POST["editRoleBtn"], 0);
        }else{
            alert("Veuillez entrez une valeur valide ! (member ou admin)", "warning");
        }
    }

    if(isset($_POST["editEmailBtn"]) && isset($_POST["newEmailInput"])){
        updateEmail($_POST["editEmailBtn"], $_POST["newEmailInput"]);
    }

    if(isset($_POST["editPasswordBtn"]) && isset($_POST["newPasswordInput"])){
        updatePassword($_POST["editPasswordBtn"], $_POST["newPasswordInput"]);
    }

    if(isset($_POST["showDown"])){
        if($offset >= $totalUsers - $startLimit){
            alert("Vous êtes arrivé à la fin !", "warning");
        }else{
            $offset+=$startLimit;
            header("location: ./handleMembers.php?offset=".$offset);
        }
    }

    if(isset($_POST["showUp"])){
        if($offset <= 0){
            alert("Vous êtes arrivé au début !", "warning");
        }else{
            $offset-=$startLimit;
            header("location: ./handleMembers.php?offset=".$offset);
        }
    }
}


?>


<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../assets/js/alert.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

</head>

<header>
    <?php include("../components/header.php"); ?>


</header>


<body>

<div class="flex flex-row gap-10 mt-10 justify-center h-fit">

    <form method="post" class="flex flex-col gap-3 p-3 w-fit items-center">
        <h2 class="cinzel text-3xl font-bold">Vos utilisateurs</h2>

        <div class="p-2 rounded-xl border-1 flex flex-col gap-2">
            <button type="submit" name="showUp" class="bg-yellow-800/75 rounded-2xl text-2xl p-2 text-white">Monter</button>

            <div>
                <?php foreach (getUsers($startLimit, $offset) as $user) { ?>

                    <div class="flex flex-col gap-1 rounded-xl border-1 w-[20rem] p-2">
                        <p class="text-xl font-bold"><?= $user["username"] ?></p>
                        <div class="flex flex-row justify-between">
                            <p class="text-m"><?= $user["admin"] == 1 ? "administrateur" : "membre" ?></p>
                            <p class="text-m"><?= $user["account_creation"] ?></p>
                        </div>
                        <button type="submit" name="handleUserBtn" value="<?= $user["email"] ?>" class="bg-green-700 rounded-xl h-8 text-white ">Gérer</button>
                    </div>

                <?php }?>
            </div>

            <button type="submit" name="showDown" class="bg-yellow-800/75 rounded-2xl text-2xl p-2 text-white">Descendre</button>

        </div>
    </form>



    <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["handleUserBtn"])){
            $currentUser = getUserDatas($_POST["handleUserBtn"])[0];
            ?>
            <form method="post" class="h-fit border-1 rounded-xl p-2 flex flex-col gap-3">
                <h2 class="cinzel text-2xl font-bold p-2">Gestion de l'utilisateur</h2>

                <div>
                    <h3 class="text-l font-semibold">Nom actuel : <?= $currentUser["username"] ?></h3>
                    <div class="flex flex-row border-1 p-2 gap-1 rounded-xl">
                        <input name="newNameInput" class="p-1" type="text" placeholder="Modifier le nom">
                        <button name="editNameBtn" value="<?= $currentUser["id"] ?>" class="bg-green-700 text-white text-semibold text-l rounded-xl w-full p-2">Valider</button>
                    </div>
                </div>

                <div>
                    <h3 class="text-l font-semibold">Rôle actuel : <?= $currentUser["admin"] == 1 ? "admin" : "membre" ?></h3>
                    <div class="flex flex-row border-1 p-2 gap-1 rounded-xl">
                        <input name="newRoleInput" class="p-1" type="text" placeholder="Modifier le rôle">
                        <button name="editRoleBtn" value="<?= $currentUser["id"] ?>" class="bg-green-700 text-white text-semibold text-l rounded-xl w-full p-2">Valider</button>
                    </div>
                </div>

                <div>
                    <h3 class="text-l font-semibold">Email actuel : <?= $currentUser["email"] ?></h3>
                    <div class="flex flex-row border-1 p-2 gap-1 rounded-xl">
                        <input name="newEmailInput" class="p-1" type="text" placeholder="Modifier le mail">
                        <button name="editEmailBtn" value="<?= $currentUser["id"] ?>" class="bg-green-700 text-white text-semibold text-l rounded-xl w-full p-2">Valider</button>
                    </div>
                </div>

                <div class="flex flex-row border-1 p-2 gap-1 rounded-xl">
                    <input name="newPasswordInput" class="p-1" type="text" placeholder="Modifier le mot de passe">
                    <button name="editPasswordBtn" value="<?= $currentUser["id"] ?>" class="bg-green-700 text-white text-semibold text-l rounded-xl w-full p-2">Valider</button>
                </div>



            </form>
        <?php }
    } ?>
</div>

</body>
</html>