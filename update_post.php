<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("classes/Post.class.php");
include_once("classes/Db.class.php");

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: index.php");
}
else {
  $u = new Post();
  $update = $u->showYourPost($id); // deze functie toont de post van de gebruiker
  }
  if(!empty($_POST['btn_edit'])){

    //$image = $_FILES['upload_file']['name'];
    $description = $_POST['description'];
    $image = $_FILES['upload_file']['name'];
    $tmp_dir = $_FILES['upload_file']['tmp_name'];
    $imageSize = $_FILES['upload_file']['size'];

    $u = new Post();
    $u->setDescription($description);
    $u->setImage($image);

    if($u->updatePost($id)){
      $upload_dir = '/data/post/';
      $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
      $update= rand(1000, 100000000) . "." . $imgExt;
      unlink($upload_dir . $update['post_img']);
      move_uploaded_file($tmp_dir, $upload_dir.$update);
    }  // deze functie geeft een update van bewerkte post






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
  <header class="uploadHeader">
      <nav class="uploadNav">
          <a href="index.php" class="back">Back</a>
          <h1>Edit your Post</h1>
      </nav>
  </header>
  <form id="uploadForm" action="" method="post"enctype="multipart/form-data" id="uploadForm">>

      <?php if (isset($error)): ?>
          <div><?php echo $error; ?></div>
      <?php endif; ?>
      <div id="divFormUpload">
      <img class="imgPost" name="upload_file" src="data/post/<?php echo $update['post_img'] ?>" alt="post_img" height="auto" width="400px">
      <input id="uploadImage"type="file" name="upload_file" onchange="readURL(this)">
      <!-- huidige beschrijving van de post moet in de input staan -->
      <input id="description"type="text" name="description" placeholder="Description" value="<?php echo $update['description']; ?>">
      <input id="submitUpload"type="submit" value="EDIT" name="btn_edit">
  </form>
</div>

</body>

</html>
