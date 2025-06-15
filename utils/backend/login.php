<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '/var/www/archeo-it/utils/database/connection.php';
include_once '/var/www/archeo-it/utils/database/user.php';
include_once '/var/www/archeo-it/utils/backend/log.php';
function checkLogin($email, $password){
    /**
     * Allows to get the user password by its email.
     *
     * @param string $email         Corresponds to the email used by the user for archeo-IT.
     * @param string $password      Corresponds to the password used by the user during logging in.
     * @return int                  Corresponds to the status code of the function : 0 = failed, 1 = success.
     *
     * @throws Exception      For any error.
     */

    $hashedPassword = getUserPassword(htmlspecialchars($email));

    if(empty($hashedPassword)){
        alert("Ce mail n'existe pas !", "danger");
        return 0;
    }else if(!password_verify($password, $hashedPassword)){
        alert("Le mot de passe est incorrect !", "danger");
        return 0;
    }
    alert("Connexion effectuée avec succes !", "success");
    $userDatas = getUserDatas(htmlspecialchars($email))[0];
    $_SESSION['user'] = $userDatas;
    write_log($userDatas["username"]." s'est connecté. Id : ".$userDatas["id"]." Mail : ".$userDatas["email"], "connexion");
    return 1;
}


function registerUser($username, $email, $password, $passwordConfirm){
    /**
     * Allows to get the user password by its email.
     *
     * @param string $username            Corresponds to the name that the user plan to use.
     * @param string $mail                Corresponds to the email that the user plan to use.
     * @param string $password            Corresponds to the password that the user plan to use.
     * @param string $passwordConfirm     Corresponds to the confirmation of the password that the user plan to use.
     * @return int                        Corresponds to the status code of the function : 0 = failed, 1 = success.
     *
     * @throws Exception      For any error.
     */
    $minimumPasswordLength = 4;

    if($password != $passwordConfirm){
        alert("Les mots de passe ne correspondent pas !", "danger");
        return 0;

    }else if(strlen($password) < $minimumPasswordLength) {
        alert("Veuillez entrer une taille de mot de passe supérieure à " . $minimumPasswordLength . " !", "danger");
        return 0;

    }else if(!empty(getUserPassword($email))){
        alert("Cette adresse email existe déjà !", "danger");
        return 0;

    }else if(nameExists($username)) {
        alert("Ce nom d'utilisateur existe déjà !", "danger");
        return 0;
    }

    insertUser(htmlspecialchars($email), password_hash($password, PASSWORD_DEFAULT), htmlspecialchars($username));
    write_log("$$username a crée un nouveau compte. Mail : $email. ", "inscription");
    return 1;

}


function checkLoginInputs($loginPost){
    if (empty($loginPost["loginMailInput"])){
        alert("Veuillez entrer un mail !", "danger");

    }else if (empty($loginPost["loginPasswordInput"])){
        alert("Veuillez entrer un mot de passe !", "danger");

    }else{
        checkLogin(htmlspecialchars($loginPost["loginMailInput"]), htmlspecialchars($loginPost["loginPasswordInput"]));
    }
}


function checkRegisterInputs($registerPost)
{
    if (empty($registerPost["registerMailInput"])) {
        alert("Veuillez entrer un mail !", "danger");

    } else if (empty($registerPost["passwordRegisterInput"])) {
        alert("Veuillez entrer un mot de passe !", "danger");

    } else if (empty($registerPost["passwordConfirmInput"])) {
        alert("Veuillez confirmer le mot de passe !", "danger");

    } else if (empty($registerPost["RegisterUsernameInput"])) {
        alert("Veuillez entrer un nom d'utilisateur !", "danger");

    } else {
        registerUser(htmlspecialchars($registerPost["RegisterUsernameInput"]), htmlspecialchars($registerPost["registerMailInput"]), htmlspecialchars($registerPost["passwordRegisterInput"]), htmlspecialchars($registerPost["passwordConfirmInput"]));
    }
}