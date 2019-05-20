<?php

// color
use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;


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


//////////////////////////////////////////////
///////////////// LOAD MORE ///////////////// feature 7
// post limiet bij 20 -> op de index pagina

    public static function getAll($words, $myuserid) {
        $conn = Db::getInstance();
        $limitposts = 20; // wordt opgehaald in loadmore.php
        $hashtags = array();
                    
        $arrayLength = sizeof($words) - 1;
            for ($i = 0; $i <= $arrayLength; $i++) {
                $hashtags[] = 'description LIKE "%'.htmlspecialchars($words[$i]["hashtag"]).'%"';
            }

            if($arrayLength <= 0){
                $statement = $conn->prepare("select * from posts where user_id in (10,9,8, :user_id)" .implode(" OR ", $hashtags) . " ORDER BY upload_time DESC limit $limitposts");
            } else {
                $statement = $conn->prepare("select * from posts where user_id in (10,9,8, :user_id) OR " .implode(" OR ", $hashtags) . " ORDER BY upload_time DESC limit $limitposts");
            }

        $statement->bindValue(":user_id", $myuserid);

        //AANGEZIEN FRIENDS NOG NIET GEMAAKT IS, HARD CODED FRIEND LIST OM CODE TE DOEN WERKEN
        $statement->execute();
        $result = $statement->fetchAll( PDO::FETCH_ASSOC );
        return $result;
    }

    public function loadMore(){
        $conn  = Db::getInstance();
        $statement = $conn->prepare(" SELECT DISTINCT id, description, post_img FROM posts ORDER BY id DESC limit $no ,20");
        $statement->bindValue(":id",$_SESSION['id']);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC); 
    }


    //////////////////////////////////////////////////
    ///////////////// COLOR EXTRATOR ///////////////// feature 14
    //////////////////////////////////////////////////

    public function saveColors() {
        // extract from image
        $palette = Palette::fromFilename($this->thumbPath);
        $extractor = new ColorExtractor($palette);
        $colors = $extractor->extract(5);
        // and save to db
        foreach($colors as $color) {
            $statement = $this->db->prepare("insert into posts_colors (post_id, hex) VALUES (:postId, :hex)");
            $statement->bindValue(":postId", $this->id);
            $statement->bindValue(":hex", Color::fromIntToHex($color));
            $statement->execute();
        }
    }

    public function fetchColors($postId) {
        $statement = $this->db->prepare("SELECT * FROM posts_colors WHERE post_id = :postId");
        $statement->bindParem(":postId", $postId);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchPostOnColor($color) {
        $statement = $this->db->prepare("SELECT * FROM `posts_colors` INNER JOIN posts ON posts.id = posts_colors.post_id INNER JOIN users ON users.id = posts.user_id WHERE posts_colors.hex = :color AND posts.private != 1");
        $statement->bindParam(":color". $color);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }





}
?>
