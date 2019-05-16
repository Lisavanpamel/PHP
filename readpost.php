<?php
  /* roep de functie op om de details van een post te vragen (foto, beschrijving, van welke user, likes, comments)
    dit gebeurt in de classe Post,
      - select * from "posts" where id = ":id"
  */
  include_once("includes/header.inc.php");
  include_once("classes/Post.class.php");
  include_once("classes/Db.class.php");

  $id = null;
  if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
  }

  if ( null==$id ) {
      header("Location: readpost.php");
      echo "this post doesn't exist anymore";
  }
  else {
    $p = new Post();
    $post = $p->showPost($id);

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
<div class="detail_post" data-id="<?php echo $post['id']?>">
<!--User id: naam n profiel foto evt weergeven -->
    <img class= "img" src="<?php echo $post['post_img']; ?>" alt="post_img" height="auto" width="250px">
    <p class="description"><?php echo $post['description']; ?></p>
  </div>

<!-- toon de commentaren -->
<div class="comments">
<h2>Comments</h2>
<form action="" method="post">
  <textarea name="comment" form="usrform" placeholder="Write your comment..." style="width: 300px;"></textarea>
  <br>
  <input type="submit" value="send comment">
</form>
</div>

<?php include_once("includes/footer.inc.php"); ?>
</body>
</html>
