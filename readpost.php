<?php
  /* roep de functie op om de details van een post te vragen (foto, beschrijving, van welke user, likes, comments)
    dit gebeurt in de classe Post,
      - select * from "posts" where id = ":id"
  */
  include_once("includes/header.inc.php");
  include_once("classes/Post.class.php");
  include_once("classes/Db.class.php");

  if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
      $detail_post = new Post;
      $detail_post->getPost($id);

  }



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Post</title>
</head>
<body>

<!-- toon de post -->
<div class="post" data-id="<?php echo $post['id']?>">
<!--User id: naam n profiel foto evt weergeven -->
    <img class= "img" src="<?php echo $post['post_img']; ?>" alt="post_img" height="auto" width="60px">
    <p class="description"><?php echo $post['description']; ?></p>

<!-- toon de commentaren -->



</body>
</html>
