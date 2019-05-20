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
    <title>PHP Project</title>
</head>
<body>

<div id="success_message">test</div>

    <?php while($row = $posts->fetch()) : ?>

        <div class="post" data-id="<?php echo $row['id']?>">
        <!--User id: naam n profiel foto evt weergeven -->
            <a href="readpost.php?id=<?php echo $row['id']; ?>">
            <img class="imgPost" src="data/post/<?php echo $row['post_img'] ?>" alt="post_img" height="auto" width="400px">
            </a>
            <p class="description"><?php echo $row['description'] ?></p>
            <p class="date"><?php echo $row['date'] ?></p>
            <a href="update_post.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete_post.php?id=<?php echo $row['id']; ?>">Delete</a>

            <!-- user already likes post -->
			<span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
            <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
            <!-- user has not yet liked post -->
			<span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
            <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
            <span class="likes_count"><?php echo $row['likes']; ?> likes</span>

    </div>
    <?php endwhile; ?>

    <button class="show-posts">Show more</button>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
