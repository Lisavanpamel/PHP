<?php
include_once("includes/header.inc.php");
include_once("classes/Post.class.php");
include_once("classes/Db.class.php");
include_once("like.php");
$post = new Post();
$posts = $post->getPosts();


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

    <?php while($row = $posts->fetch()) : ?>

        <div class="post" data-id="<?php echo $row['id']?>">
        <!--User id: naam n profiel foto evt weergeven -->
            <img class= "img" src="<?php echo $row['post_img'] ?>" alt="post_img" height="auto" width="60px">
            <p class="description"><?php echo $row['description'] ?></p>




        <!--Likes -->
        <?php
        // determine if user has already liked this post
        $con = mysqli_connect('localhost', 'root', 'root', 'php2019');
        $results = mysqli_query($con, "SELECT * FROM likes WHERE userid=1 AND postid=".$row['id']."");

        if (mysqli_num_rows($results) == 1 ): ?>
            <!-- user already likes post -->
            <span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
            <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
        <?php else: ?>
            <!-- user has not yet liked post -->
            <span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
            <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
        <?php endif ?>

        <span class="likes_count"><?php echo $row['likes']; ?> likes</span>

    </div>
    <?php endwhile; ?>



    <button class="show-posts">Show more</button>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
