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
////////////// POSTS SAVEN
    public function savePost(){
        $conn = Db::getInstance();
        //$statement = $conn->prepare("insert into posts (user_id, description, post_img) VALUES (:id, :d, :p)");
        $statement = $conn->prepare("insert into posts ( description, post_img) VALUES (:d, :p)");
        //$statement->bindValue(":id", $this->getUserId());
        $statement->bindValue(":d", $this->getDescription());
        $statement->bindValue(":p", $this->getImage());
       // $statement->bindValue(":t", $this->getTitle());
        $statement->execute();
        return true;
    }
    public function getPosts(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from posts");
        $statement->execute();
        return $statement;
    }
    ///////// search post or user
    /*
    public function search($searchkey){
      $conn = Db::getInstance();
      $poststatement = $conn->prepare("select * from posts where title like '$searchkey%'");
      $userstatement = $conn->prepare("select * from users where first_name like '$searchkey%'
      union select * from users where last_name like '$searchkey%'
      union select * from users where user_name like '$searchkey%'");
      $poststatement->bindValue(1, '$searchkey%', PDO::PARAM_STR);
      $userstatement->bindValue(1, '$searchkey%', PDO::PARAM_STR);
      $posts = $poststatement->execute();
      $users = $userstatement->execute();
      //$posts = $poststatement->fetchAll();
      //$users = $userstatement->fetchAll();


    }
    */



    public function searchPost($searchkey){
      $conn = Db::getInstance();
      $statement = $conn->prepare("select * from posts where title like '$searchkey%'");
      $statement->bindValue(1, '$searchkey%', PDO::PARAM_STR);
      $statement->execute();
      $statement->fetchAll();
      return $statement;
    }




/////// detail page van een post
    public function getPost($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("select * from posts where id= ?");
      $statement->execute(array($id));
      $post = $statement->fetch(PDO::FETCH_ASSOC);


    }



}
?>
