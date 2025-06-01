<?php

include_once "/var/www/archeo-it/components/alert.php";

/**
 * Allows to handle the user registration and login.
 */

function insertUser($mail, $password, $username){

    try {
        /**
         * Insert a user according to a mail, a password, a username.
         *
         * @param string $mail         Corresponds to the user mail.
         * @param string $password     Corresponds to the user password.
         * @param string $username     Corresponds to the user username.
         * @return int
         *
         * @throws Exception For any error.
         */
        global $pdo;
        $req = "INSERT INTO users (email, password, username, account_creation, admin) VALUES (:mail, :password, :username, CURRENT_DATE, 0);";
        $result = $pdo->prepare($req);
        $result->execute(['mail' => $mail, 'password' => $password, 'username' => $username]);
        alert("L'inscription a réussie avec succès !", "success");
    }catch(Exception $e){
        alert("Une erreur interne est survenue lors de l'inscription... Veuillez réessayer", "danger");
    }
}




function getUserPassword($mail){

    try {
        /**
         * Allows to get the user password by its email.
         *
         * @param string $mail    Corresponds to the user mail.
         * @return string
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT password FROM users WHERE email = :mail;";
        $result = $pdo->prepare($req);
        $result->execute(['mail' => $mail]);
        if($result->rowCount() === 1){
            return $result->fetch()['password'];
        }
        return "";

    }catch(Exception $e){
        alert("Une erreur interne est survenue lors de l'inscription... Veuillez réessayer", "danger");
    }
}


function nameExists($username){

    try {
        /**
         * Allows to know if a username already exists or not.
         *
         * @param string $username   Corresponds to the username.
         * @return bool              Returns whether the user exists. true = a user exists. false = there is no user existing.
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT username FROM users WHERE username = :username;";
        $result = $pdo->prepare($req);
        $result->execute(['username' => $username]);
        if($result->rowCount() > 0){
            return true;
        }
        return false;

    }catch(Exception $e){
        alert("Une erreur interne est survenue lors de l'inscription... Veuillez réessayer", "danger");
    }
}




?>