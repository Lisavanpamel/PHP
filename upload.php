<?php
    include_once ('classes/Post.class.php');

if (!empty($_POST)){
    $title = $_POST['title'];
    $image = $_POST['upload_file'];
    $description = $_POST['description'];

    if (!empty($image) && !empty($description) && !empty($title)) {
        $post = new Post();
        $post->setImage($image);
        $post->setDescription($description);
        $post->setTitle($title);
        if ($post->SavePost()) {
            header('location: index.php');
        } else {
            echo "Something went wrong";
        }
    } else {
        $error = "Leave no empty fields!";
    }
}

?><!doctype html>
<html lang="en">
<head>
    <title>What do you like to post?</title>
</head>
<body>


<form action="" method="post">
    <h1>Upload Post</h1>

    <?php if (isset($error)): ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>

    <input type="text" name="title" placeholder="Title">
    <input type="file" name="upload_file"  accept="image/*">
    <input type="text" name="description" placeholder="Description">
    <input type="submit">
</form>

</body>
</html>
