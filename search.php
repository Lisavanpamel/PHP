<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("classes/Db.class.php");
include_once("includes/header.inc.php");
include_once("classes/Post.class.php");
include_once("classes/User.class.php");


if(isset($_POST['search'])){
  $searchkey = $_POST['search'];
  //$search = new Post();
  //$search->search($searchkey);
  $search_posts = new Post();
  $result_posts = $search_posts->searchPost($searchkey);
  $search_users = new User();
  $result_users = $search_users->searchUser($searchkey);



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
    <title>Search</title>
</head>
<body>

  <div class="search_results">
    <?php if($result_posts->rowCount() > 0 || $result_users->rowCount() > 0 ): ?>
    <h1><?php echo $result_posts->rowCount() + $result_users->rowCount() .  " searchresult(s) found for " . "<span style = 'font-weight: bold'> &quot" . $searchkey . "&quot </span>"; ?></h1>
  <?php else: ?>
    <h1>No results found </h1>
    <?php foreach($result_posts as $post): ?>
      <!-- de "a href" gaat naar de detailagina van een post -->
      <a href="readpost.php?id= <?php echo $post['id']; ?>">
      <div class="post" data-id="<?php echo $post['id']?>">
      <!--User id: naam n profiel foto evt weergeven -->
          <img class= "img" src="<?php echo $post['post_img'] ?>" alt="post_img" height="auto" width="60px">
          <p class="description"><?php echo $post['description'] ?></p>
          </div>
        </a>
    <?php endforeach; ?>
    <?php foreach($result_users as $user): ?>
      <div style="background-image: url(<?php echo $user['user_img']; ?>)"></div>
      <a href=""><?php echo $user['user_name']; ?></a>
    <?php endforeach; ?>
    <?php endif; ?>

      <!--Toont de zoekresultaten van de posts -->
      <?php if($result_posts->rowCount() > 0): ?>

      <?php endif; ?>

      <?php if($result_users->rowCount() > 0): ?>

      <?php endif; ?>



</div>

</body>
</html>
