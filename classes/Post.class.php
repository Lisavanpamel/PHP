<?php

include_once ('Db.class.php');

class Post {
    private $image;
    private $description;
    private $user_id;
    private $title;

    
///////////// IMAGE 
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
/////////////// DESCRIPTION
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
////////////// user_id 
    public function getUser_id()
    {
        return $this->user_id;
    }
 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
/////////////// TITLE
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
////////////// POSTS SAVEN

    public function savePost(){
        $conn = Db::getInstance();
        //$statement = $conn->prepare("insert into posts (user_id, description, post_img, title) VALUES (:id, :d, :p, :t)");
        $statement = $conn->prepare("insert into posts ( description, post_img, title) VALUES (:d, :p, :t)");
        //$statement->bindValue(":id", $this->getUserId());
        $statement->bindValue(":d", $this->getDescription());
        $statement->bindValue(":p", $this->getImage());
        $statement->bindValue(":t", $this->getTitle());
        $statement->execute();
        return true;
    }
    public function getPosts(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from posts");
        $statement->execute();
        return $statement;
    }
}
?>