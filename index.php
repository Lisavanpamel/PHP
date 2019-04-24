<?php 
include_once("includes/header.inc.php"); 
include_once("classes/Post.class.php");
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
            </div>
        </div>
    <?php endwhile; ?>

    <button class="show-posts">Show more</button>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>