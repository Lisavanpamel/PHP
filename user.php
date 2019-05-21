<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("classes/User.class.php");
include_once("classes/Db.class.php");

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: testuser.php");
}
else {
  $u = new User();
  $users = $u->showUser($id);
  $posts = $u->showPostsFromUser($id);
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
    <title><?php echo $users['user_name']; ?></title>
</head>



<body>
<?php include_once("includes/header.inc.php"); ?>
<!-- header waarin de profielfoto van de user zit -->
<div class="user_header">
<div class="profile">
<div class="profile_pic" style="background-image: url(<?php $users['user_img']; ?>);"></div>
<br>
<p><?php echo $users['user_name']; ?></p>
</div>

<button class="follow_button">Follow</button>
</div>

<div class="follow">
<a href="#"><span>20K </span>followers</a>
<a href="#"><span>10K </span>following</a>
</div>
<div class="content_about_user">

<div class="about_user">

<h1>About</h1>
<p> <?php echo $users['bio']; ?></p>
<br>
<p><span style="font-weight: bold">Full name:</span> <?php echo $users['first_name'] . " " . $users['last_name']; ?></p>

<p><span style="font-weight: bold">Birthdate:</span> <?php echo $users['birthdate']; ?></p>
</div>

<!-- alle posts van de user -->
<div class="posts_from_user">
  <h1>Images</h1>
<?php if(count($posts) == 0 ): ?>
  <p>This person has no images yet</p>
<?php else: ?>
<?php foreach($posts as $post): ?>
  <div class="post" data-id="<?php echo $post['posts.id']?>">
  <!--User id: naam n profiel foto evt weergeven -->
      <img class= "img" src="data/post/<?php echo $post['post_img']?>" alt="post_img" height="auto" width="60px">
      <p class="description"><?php echo $post['description'] ?></p>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>

</div>
<?php include_once("includes/footer.inc.php"); ?>
</body>


</html>
