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
  $d = new Post();
  $post = $d->showYourPost($id); // deze functie toont de post van de gebruiker

  }
  if(!empty($_POST['delete'])){
    $d = new Post();
    $delete = $d->deleteYourPost($id);
    // gedelete post verdwijnt uit de database maar de image staat nog in mapje .../data/posts/
    // hoe verwijder je een image uit het mapje?
    // geef een melding dat het succesvol is gedeletet
  }
  if(!empty($_POST['cancel']))
  {
    echo "test";
    header("Location: index.php");
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
    <title>Delete your post</title>
</head>

<style>

  #delete
  {
    color: #fff;
    font-weight: bold;
    background-color: rgb(255,59,10);
    border-style: none;
    padding: 10px;
    width: 150px;

  }

  #cancel
  {
    font-weight: bold;
    border-style: none;
    padding: 10px;
    width: 150px;
  }

  #delete_form
  {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
  }

  #delete_form input
  {
    margin-top: 50px;
    margin-left: 20px;
  }

</style>


<body>
  <header class="uploadHeader">
      <nav class="uploadNav">
          <h1>Are you sure you want to delete this post?</h1>
      </nav>
  </header>

<form action=""method="post" id="delete_form">
  <div class="post" data-id="<?php echo $post['id']?>">
  <img class="imgPost" src="data/post/<?php echo $post['post_img'] ?>" alt="post_img" height="auto" width="400px">
  <p class="description"><?php echo $post['description'] ?></p>
</div>
<br>
<input id="delete" type="submit"name="delete" value="DELETE">
<input id="cancel" type="submit"name="cancel" value="CANCEL">
</form>

</body>

</html>
