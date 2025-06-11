<?php

include_once "/var/www/archeo-it/components/alert.php";

/**
 * Allows to handle the user registration and login.
 */

function insertBlog($creator_id) {
    try {
        /**
         * Insert a blog.
         *
         * @param string $creator_id    Corresponds to the blog creator
         * @return string                  ID of the inserted blog
         *
         * @throws Exception For any error.
         */
        global $pdo;

        $req = "INSERT INTO blogs(creator_id) VALUES (:creator_id)";
        $stmt = $pdo->prepare($req);
        $stmt->execute(["creator_id" => $creator_id]);
        $lastId = $pdo->lastInsertId();

        alert("Blog créé ! Vous pouvez désormais le modifier.", "success");

        return $lastId;
    } catch (Exception $e) {
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return "";
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
        return $result->fetchAll();


    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return [];
    }
}


function getPendingBlog($creator_id){

    try {
        /**
         * Allows to get all blogs data
         *
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT * FROM blogs WHERE creator_id = :creator_id;";
        $result = $pdo->prepare($req);;
        $result->execute(["creator_id" => $creator_id]);
        return $result->fetchAll();

    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return [];
    }
}




function updateTitle($title, $blog_id){

    try {
        /**
         * Allows to get all blogs data
         * @param string $title   Corresponds to the article's title.
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "UPDATE blogs SET title = :title WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(["title" => $title, "id" => $blog_id]);
        alert("Le titre a bien été changé !", "success");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}

function insertParagraph($paragraph, $blog_id, $position){

    try {
        /**
         * Allows to add paragraphs to a blog/site
         * @param string $paragraph   Corresponds to the article paragraph
         * @param string $blog_id     Corresponds to the article id
         * @param string $position    Corresponds to the paragraph position in the article
         *
         * @throws Exception          For any error.
         */
        global $pdo;
        $req = "INSERT INTO texts(type, content, parent_id, position) VALUES(:type, :content, :parent_id, :position)";
        $result = $pdo->prepare($req);
        $result->execute(["type" => 0,"content" => $paragraph, "parent_id" => $blog_id, "position" => $position]);
        alert("Le texte a bien été ajouté !", "success");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


?>