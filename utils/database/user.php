<?php

include_once "../../components/alert.php";

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
         * @return no-return
         *
         * @throws Exception For any error.
         */
        global $pdo;
        $req = "INSERT INTO users (email, password, username) VALUES (:mail, :password, :username);";
        $result = $pdo->prepare($req);
        $result->execute(['mail' => $mail, 'password' => $password, 'username' => $username]);
        alert("L'inscription a réussie avec succès !", "success");
    }catch(Exception $e){
        alert("Une erreur interne est survenue lors de l'inscription... Veuillez réessayer", "danger");
    }
}


?>