<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("includes/header.inc.php");
include_once("classes/Post.class.php");
include_once("classes/Db.class.php");

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: post_test.php");
}
else {
  $u = new Post();
  $update = $u->showYourPost($id); // deze functie toont de post van de gebruiker
}


if(!empty($_POST['btn_edit'])){
  $image = $_POST['upload_file'];
  $description = $_POST['description'];

  $u = new Post();
  $u->setImage($image);
  $u->setDescription($description);
  $u->updatePost();  // deze functie geeft een update van bewerkte post
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit your post</title>
</head>
<body>
  <form action="" method="post">

      <h1>Edit your Post</h1>

      <?php if (isset($error)): ?>
          <div><?php echo $error; ?></div>
      <?php endif; ?>


      <!--<input type="text" name="title" placeholder="Title">-->
      <img src="<?php echo $update['post_img']; ?>">
      <input type="file" name="upload_file" value="<?php echo $update['post_img']; ?>">
      <!-- huidige beschrijving van de post moet in de input staan -->
      <input type="text" name="description" placeholder="Description" value="<?php echo $update['description']; ?>">
      <input type="submit" value="Upload your Edit" name="btn_edit">
  </form>


</body>

</html>
