<?php

include_once "/var/www/archeo-it/components/alert.php";

/**
 * Allows to handle the user registration and login.
 */

function insertBlog($creator_id){

    try {
        /**
         * Insert a blog.
         *
         * @param string $creator_id       Corresponds to the blog creator
         * @return int
         *
         * @throws Exception For any error.
         */
        global $pdo;
        $req = "INSERT INTO blogs(creator_id) VALUES (:creator_id); SELECT LAST_INSERT_ID() FROM blogs;";
        $result = $pdo->prepare($req);
        $result->execute(["creator_id" => $creator_id]);
        alert("Blog crée ! Vous pouvez désormais le modifier.", "success");
        return $result->fetch();
    }catch(Exception $e){
        alert("Une erreur interne est survenue lors de l'inscription... Veuillez réessayer", "danger");
    }
}



function getBlogDatas(){

    try {
        /**
         * Allows to get all blogs data
         *
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT * FROM blogs";
        $result = $pdo->prepare($req);


    }catch(Exception $e){
        alert("Une erreur interne est survenue lors de l'inscription... Veuillez réessayer", "danger");
        return [];
    }
}


function updateTitle($title, $blog_id){

    try {
        /**
         * Allows to get all blogs data
         *
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT * FROM blogs";
        $result = $pdo->prepare($req);
        return $result->fetchAll();

    }catch(Exception $e){
        alert("Une erreur interne est survenue lors de l'inscription... Veuillez réessayer", "danger");
        return [];
    }
}




?>