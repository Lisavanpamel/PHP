<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("classes/Db.class.php");
include_once("includes/header.inc.php");
include_once("classes/Post.class.php");
include_once("classes/User.class.php");
include_once("like.php");


if(isset($_GET['search'])){
  $searchkey = $_GET['search'];
  //$search = new Post();
  //$search->search($searchkey);
  $search_posts = new Post();
  $result_posts = $search_posts->searchPost($searchkey);
  //$count_posts = $search_posts->countPosts();
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
      <?php if(count($result_posts) > 0 || count($result_users) > 0 ): ?>
        <h1> <?php echo count($result_posts) + count($result_users) . " searchresult(s) found for " . "<span style = 'font-weight: bold'> &quot" . $searchkey . "&quot </span>"; ?></h1>
    <?php else: ?>
      <h1>No results found </h1>
      <?php endif; ?>
      <nav>
        <a href="#" id="href_post">Images</a>
        <a href="#" id="href_user">Users</a>
      </nav>
      <!--Toont de zoekresultaten van de posts -->
        <div id="post_results">
        <?php foreach($result_posts as $post): ?>
          <!-- de "a href" gaat naar de detailagina van een post -->
            <div class="post" data-id="<?php echo $row['id']?>">
            <a href="readpost.php?id=<?php echo $post['id']; ?>">
            <img class="imgPost" src="data/post/<?php echo $post['post_img'] ?>" alt="post_img" height="auto" width="400px">
            </a>
            <p class="description"><?php echo $post['description'] ?></p>

            <!-- user already likes post -->
			<span class="unlike fa fa-thumbs-up" data-id="<?php //echo $row['id']; ?>"></span>
            <span class="like hide fa fa-thumbs-o-up" data-id="<?php //echo $row['id']; ?>"></span>
            <!-- user has not yet liked post -->
			<span class="like fa fa-thumbs-o-up" data-id="<?php //echo $row['id']; ?>"></span>
            <span class="unlike hide fa fa-thumbs-up" data-id="<?php //echo $row['id']; ?>"></span>
            <span class="likes_count"><?php //echo $row['likes']; ?> likes</span>
          </div>

        <?php endforeach; ?>
        </div>


      <!-- toont de zoekresultaten van de users -->
        <div id="user_results">
          <?php foreach($result_users as $user): ?>
            <a href="user.php?id=<?php echo $user['id']; ?>">
            <div style="background-image: url(<?php echo $user['user_img']; ?>)"></div>
            <p><?php echo $user['user_name']; ?></p></a>

          <?php endforeach; ?>
        </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>
<?php include_once("includes/footer.inc.php"); ?>
</body>
</html>
