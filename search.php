<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("classes/Db.class.php");
include_once("includes/header.inc.php");


if(isset($_POST['search'])){
  $searchkey = $_POST['search'];
  $conn = Db::getInstance();
  $poststatement = $conn->prepare("select * from posts where title like '$searchkey%'");
  $userstatement = $conn->prepare("select * from users where first_name like '$searchkey%'
  union select * from users where last_name like '$searchkey%'
  union select * from users where user_name like '$searchkey%'");
  $poststatement->bindValue(1, '$searchkey%', PDO::PARAM_STR);
  $userstatement->bindValue(1, '$searchkey%', PDO::PARAM_STR);
  $poststatement->execute();
  $userstatement->execute();
  $posts = $poststatement->fetchAll();
  $users = $userstatement->fetchAll();

}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Search</title>
</head>
<body>

  <div class="container">
      <?php if($poststatement->rowCount() > 0 || $userstatement->rowCount() > 0 ): ?>
      <p><?php echo $poststatement->rowCount() + $userstatement->rowCount() .  " searchresult(s) found for " . $searchkey; ?></p>
    <?php else: ?>
      <p>No results found </p>
      <?php endif; ?>


      <!--Toont de zoekresultaten van de posts -->
      <?php if($poststatement->rowCount() > 0): ?>
        <?php foreach($posts as $post): ?>
          <a href=""><?php echo $post['title']; ?>
            <div style="background-image: url(<?php echo $post['post_img']; ?>)"></div>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>


      <!-- toont de zoekresultaten van de users -->
        <?php if($userstatement->rowCount() > 0): ?>
          <?php foreach($users as $user): ?>
            <div style="background-image: url(<?php echo $user['user_img']; ?>)"></div>
            <a href=""><?php echo $user['user_name']; ?></a>
          <?php endforeach; ?>
        <?php endif; ?>

  </div>


</body>
</html>
