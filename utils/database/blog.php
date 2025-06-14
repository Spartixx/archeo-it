<?php

include_once "/var/www/archeo-it/components/alert.php";

/**
 * Allows to handle the user registration and login.
 */

function insertBlog($creator_id, $type) {
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

        $req = "INSERT INTO blogs(creator_id, creation_date, type) VALUES (:creator_id, CURRENT_DATE, :type)";
        $stmt = $pdo->prepare($req);
        $stmt->execute(["creator_id" => $creator_id, "type" => $type]);
        return $pdo->lastInsertId();
    } catch (Exception $e) {
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return "";
    }
}




function getBlogsDatas($type){

    try {
        /**
         * Allows to get all blogs data
         *
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT * FROM blogs WHERE type = :type";
        $result = $pdo->prepare($req);
        $result->execute(["type" => $type]);
        return $result->fetchAll();


    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return [];
    }
}


function getPendingBlog($creator_id, $articleType){

    try {
        /**
         * Allows to get all blogs data
         *
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT * FROM blogs WHERE creator_id = :creator_id AND type = :article_type;";
        $result = $pdo->prepare($req);
        $result->execute(["creator_id" => $creator_id, "article_type" => $articleType]);
        return $result->fetchAll();

    }catch(Exception $e){
        echo $e;
        return [];
    }
}


function getMaxTextPosition($parent_id){
    try {
        /**
         * Allows to get the maximum positon (the bottm element) in an article.
         *
         * @param int $blog_id    Corresponds to the article id.
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT MAX(position) as total_elements FROM texts WHERE parent_id = :parent_id;";
        $result = $pdo->prepare($req);
        $result->execute(["parent_id" => $parent_id]);
        if ($result->rowCount() > 0){
            return $result->fetch();
        }
        return ["total_elements" => 0];

    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return [];
    }
}

function getCurrentBlog($id){

    try {
        /**
         * Allows to get all blogs data
         *
         * @return array-key      Corresponds to the user datas. keys : username, email, password, account_creation, admin
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "SELECT * FROM blogs WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(["id" => $id]);
        return $result->fetch();

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
        $req = "SELECT blogs.title, texts.content, texts.position, texts.element_type, texts.id FROM blogs INNER JOIN texts ON blogs.id = texts.parent_id WHERE blogs.id = :blog_id AND texts.type = :type ORDER BY position ASC;";
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
         * Allows to update the article title.
         * @param string $title   Corresponds to the article's title.
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "UPDATE blogs SET title = :title WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(["title" => $title, "id" => $blog_id]);
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


function updateDescription($description, $blog_id){

    try {
        /**
         * Allows to update the article description
         * @param string $description   Corresponds to the article's description.
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "UPDATE blogs SET description = :description WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(["description" => $description, "id" => $blog_id]);
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


function updateImage($image, $blog_id){

    try {
        /**
         * Allows to update the article image
         * @param string $image   Corresponds to the article image.
         *
         * @throws Exception      For any error.
         */
        global $pdo;
        $req = "UPDATE blogs SET image = :image WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(["image" => $image, "id" => $blog_id]);
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
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}


function removeText($id){

    try {
        global $pdo;
        $req = "DELETE FROM texts WHERE id = :id;";
        $result = $pdo->prepare($req);
        $result->execute(["id" => $id]);
    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
    }
}

function moveElement($position, $parent_id, $direction="up", $type=0){

    try {
        /**
         * Allows to remove a blog
         * @param string $blog_id     Corresponds to the article id
         * @return int                Corresponds to the status code
         *
         * @throws Exception          For any error.
         */
        global $pdo;
        $req = $direction == "down" ? "SELECT id, position FROM texts WHERE position > :position AND parent_id = :parent_id AND type = :type ORDER BY position ASC LIMIT 1;" : "SELECT id, position FROM texts WHERE position < :position AND parent_id = :parent_id AND type = :type ORDER BY position DESC LIMIT 1;";
        $result = $pdo->prepare($req);
        $result->execute(["position" => $position, "parent_id" => $parent_id, "type" => $type]);
        $savedRow = $result->fetch();

        if($savedRow){
            $result = $pdo->prepare("UPDATE texts SET position = :new_position WHERE position = :position AND parent_id = :parent_id AND type = :type;");
            $result->execute(["new_position" => $savedRow["position"], "position" => $position, "parent_id" => $parent_id, "type" => $type]);

            $result = $pdo->prepare("UPDATE texts SET position = :new_position WHERE id = :id AND parent_id = :parent_id AND type = :type;");
            $result->execute(["new_position" => $position, "id" => $savedRow["id"], "parent_id" => $parent_id, 'type' => $type]);
            return 1;
        }else{
            $directionFormat = $direction == "up" ? "haut" : "bas";
            alert("Cet élément ce situe déjà à l'endroit le plus ".$directionFormat." !", "warning");
        }
        return 0;

    }catch(Exception $e){
        alert("Une erreur interne est survenue... Veuillez réessayer", "danger");
        return 0;
    }
}


?>