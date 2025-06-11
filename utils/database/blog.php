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

        $req = "INSERT INTO blogs(creator_id, creation_date) VALUES (:creator_id, CURRENT_DATE)";
        $stmt = $pdo->prepare($req);
        $stmt->execute(["creator_id" => $creator_id]);
        return $pdo->lastInsertId();
    } catch (Exception $e) {
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return "";
    }
}




function getBlogsDatas(){

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
        $result = $pdo->prepare($req);
        $result->execute(["creator_id" => $creator_id]);
        return $result->fetchAll();

    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return [];
    }
}


function getArticleDatas($blog_id, $type=0){

    try {
        /**
         * Allows to get blog datas according to its id.
         *
         * @param int $blog_id     Corresponds to the blog id.
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT blogs.title, texts.content, texts.position, texts.element_type FROM blogs INNER JOIN texts ON blogs.id = texts.parent_id WHERE blogs.id = :blog_id AND texts.type = :type ORDER BY position ASC;";
        $result = $pdo->prepare($req);;
        $result->execute(["blog_id" => $blog_id, "type" => $type]);
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

function insertText($paragraph, $parent_id, $position, $type=0, $element_type=0){

    try {
        /**
         * Allows to add paragraphs to a blog/site
         * @param string $paragraph   Corresponds to the article paragraph
         * @param int $parent_id      Corresponds to the article id
         * @param int $type           Corresponds to type of article (blog or site)
         * @param int $element_type   Corresponds to the element type (subtitle or paragraph)
         * @param int $position    Corresponds to the paragraph position in the article
         *
         * @throws Exception          For any error.
         */
        global $pdo;
        $req = "INSERT INTO texts(type, content, parent_id, position, element_type) VALUES(:type, :content, :parent_id, :position, :element_type)";
        $result = $pdo->prepare($req);
        $result->execute(["type" => $type, "content" => $paragraph, "parent_id" => $parent_id, "position" => $position, "element_type" => $element_type]);
        alert("Le texte a bien été ajouté !", "success");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


function removeBlog($blog_id){

    try {
        /**
         * Allows to remove a blog
         * @param string $blog_id     Corresponds to the article id
         *
         * @throws Exception          For any error.
         */
        global $pdo;
        $req = "DELETE FROM blogs WHERE id = :blog_id;";
        $result = $pdo->prepare($req);
        $result->execute(["blog_id" => $blog_id]);
        alert("Le blog a bien été supprimé", "success");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


function moveElement($position, $direction="up"){

    try {
        /**
         * Allows to remove a blog
         * @param string $blog_id     Corresponds to the article id
         *
         * @throws Exception          For any error.
         */
        global $pdo;
        $req = $direction == "down" ? "SELECT id, position FROM texts WHERE position > :position ORDER BY position ASC LIMIT 1;" : "SELECT id, position FROM texts WHERE position < :position ORDER BY position DESC LIMIT 1;";
        $result = $pdo->prepare($req);
        $result->execute(["position" => $position]);
        $savedRow = $result->fetch();

        if($savedRow){
            $result = $pdo->prepare("UPDATE texts SET position = :new_position WHERE position = :position;");
            $result->execute(["new_position" => $savedRow["position"], "position" => $position]);

            $result = $pdo->prepare("UPDATE texts SET position = :new_position WHERE id = :id;");
            $result->execute(["new_position" => $position, "id" => $savedRow["id"]]);
        }else{
            $directionFormat = $direction == "up" ? "haut" : "bas";
            alert("Cet élément ce situe déjà à l'endroit le plus.".$directionFormat."!", "warning");
        }

        alert("L'élément a bien été déplacé !", "success");
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


?>