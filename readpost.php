<?php

  include_once("classes/Post.class.php");
  include_once("classes/Db.class.php");
  include_once("like.php");

  $id = null;
  if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
  }

  if ( null==$id ) {
      header("Location: index.php");
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
    <title><?php echo $post['description']; ?></title>
</head>

<style>

.comments
{
  margin-left: 15%;
}

.comments input
{
  border-style: none;
  background-color: #1db954;
  color: #fff;
  padding: 5px;
  cursor: pointer;
}

</style>


<body>
<?php include_once("includes/header.inc.php"); ?>
<!-- toon de post -->
<div class="detail_post" data-id="<?php echo $post['id']?>">
<!--User id: naam n profiel foto evt weergeven -->
<img class="imgPost" src="data/post/<?php echo $post['post_img'] ?>" alt="post_img">
<p class="description"><?php echo $post['description'] ?></p>
<p class="date"><?php echo $post['date'] ?></p>
<span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
      <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
      <!-- user has not yet liked post -->
<span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
      <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
      <span class="likes_count"><?php echo $row['likes']; ?> likes</span>
  </div>

<!-- toon de commentaren -->
<div class="comments">
<h2>Comments</h2>
<form action="" method="post">
  <textarea name="comment" form="usrform" placeholder="Write your comment..." style="width: 300px;"></textarea>
  <br>
  <input type="submit" value="send">
</form>
</div>

<?php include_once("includes/footer.inc.php"); ?>
</body>
</html>
