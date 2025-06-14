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



function getUserDatas($mail){

    try {
        /**
         * Allows to get user data by its email.
         *
         * @param string $mail    Corresponds to the user mail.
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT * FROM users WHERE email = :mail;";
        $result = $pdo->prepare($req);
        $result->execute(['mail' => $mail]);
        return $result->fetchAll();

    }catch(Exception $e){
        alert("Une erreur interne est survenue lors de l'inscription... Veuillez réessayer", "danger");
        return [];
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
        return "";
    }
}



function getUsers($startLimit, $offSet){
    /**
     * Allows to get users.
     *
     * @param int $startLimit    Corresponds to the limit
     * @param int $offSet        Corresponds to the offset value
     * @return array
     *
     * @throws Exception      For any error.
     */
    try {
        global $pdo;
        $req = "SELECT * FROM users LIMIT $startLimit OFFSET $offSet;";
        $result = $pdo->query($req);
        return $result->fetchAll();

    } catch(Exception $e){
        alert("Une erreur interne est survenue lors de la récupération des utilisateurs...", "danger");
        return [];
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
        return true;
    }
}


function updateName($id, $name){

    try {
        /**
         * Allows to update the name of a member according to its id.
         * @param int $id      Corresponds to the member id
         * @param string $name   Corresponds to the member new name
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "UPDATE users SET username = :name WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(['id' => $id, 'name' => $name]);
        alert("Nom changé avec succès !");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


function updateRole($id, $role){

    try {
        /**
         * Allows to update the role of a member according to its id.
         * @param int $id        Corresponds to the member id
         * @param int $role   Corresponds to the member new role
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "UPDATE users SET admin = :role WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(['id' => $id, 'role' => $role]);
        alert("Rôle changé avec succès !");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


function updateEmail($id, $email){

    try {
        /**
         * Allows to update the email of a member according to its id.
         * @param int $id         Corresponds to the member id
         * @param string $email   Corresponds to the member new email
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "UPDATE users SET email = :email WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(['id' => $id, 'email' => $email]);
        alert("Email changé avec succès !");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}

function updatePassword($id, $password){

    try {
        /**
         * Allows to update the password of a member according to its id.
         * @param int $id            Corresponds to the member id
         * @param string $password   Corresponds to the member new password
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "UPDATE users SET password = :password WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(['id' => $id, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
        alert("Mot de passe changé avec succès !");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}

function getTotalUser(){

    try {
        /**
         * Allows to get the total number of users.
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT COUNT(id) as totalUser FROM users;";
        $result = $pdo->prepare($req);
        $result->execute();
        return $result->fetch();
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}




?>