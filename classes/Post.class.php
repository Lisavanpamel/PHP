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


    public function searchPost($searchkey){
      $conn = Db::getInstance();
      $statement = $conn->prepare("select * from posts where description like '$searchkey%'");
      $statement->bindValue(1, '$searchkey%', PDO::PARAM_STR);
      $statement->execute();
      $result = $statement->fetchAll();
      return $result;
    }


/////// detail page van een post
    public function showPost($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("select * from posts where id= '$id'");
      $statement->execute(array($id));
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

/////// toont de post van de gebruiker op de update pagina

  public function showYourPost($id){
    $conn = Db::getInstance();
    $statement = $conn->prepare("select * from posts where id= '$id'");
    $statement->execute(array($id));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  //// update jouw post

  public function updatePost($id){
    $conn = Db::getInstance();
    $statement = $conn->prepare("update posts set description=:descr, post_img=:img where id=:id");
    $statement->bindValue(":img", $this->getImage());
    $statement->bindValue(":descr", $this->getDescription());
    $statement->bindValue(":id",$id);
    if($statement->execute()){
      ?>
        <script type="text/javascript">
        alert("Post succesfully updated!");
        window.location.href="index.php";
        </script>
        <?php
      }
        else{
          echo "something went wrong";
        }
        ?>
        <script type="text/javascript">
        alert("Something went wrong...");
        </script>
        <?php
        return true;

  }

  //// delete jouw post
  public function deleteYourPost($id){
    $conn = Db::getInstance();
    $statement = $conn->prepare("delete from posts where id= :id");
    $statement->bindValue(":id", $id);
    $statement->execute();
    //header("Location: post_test.php");
    ?>
    <script type="text/javascript">
    // toon in de index een boodschap dat de post succesvol verwijderd is
    window.location.href="post_test.php";
    alert("delete succeful");
    </script>

    <?php

  }



}
?>
