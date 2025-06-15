<?php

include("../utils/database/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $pdo;
    $nom = htmlspecialchars(trim($_POST["nom"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $sujet = htmlspecialchars(trim($_POST["sujet"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $stmt = $pdo->prepare("INSERT INTO messages_contact (nom, email, sujet, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $email, $sujet, $message]);

    header("Location: contact.php?success=1");
    exit();
}


