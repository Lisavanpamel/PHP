<?php
    include_once ('classes/Post.class.php');
    if (!empty($_POST)){
        //$title = $_POST['title'];
        $image = $_FILES['upload_file']['name'];
        $description = $_POST['description'];

        $temp = explode(".", $_FILES['upload_file']['name']);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $image = $newfilename;

        try{
            if (!empty($image) && !empty($description)) {
                $post = new Post();
                $post->setImage($image);
                $post->setDescription($description);
                //$post->setTitle($title);
                define ('SITE_ROOT', realpath(dirname(__FILE__)));

                    if ($post->savePost()) {
                        $filetmp = $_FILES["upload_file"]["tmp_name"];
                        $filename = $image;
                        $destFile = __DIR__ . '/data/post/' . $filename;
                        move_uploaded_file($_FILES['upload_file']['tmp_name'], $destFile);
                        chmod($destFile, 0666);
                        header('location: index.php');
                    }
                    else {
                        echo "Something went wrong";
                    }
            }
            else {
                $error = "Leave no empty fields!";
            }
        }
        catch(exception $e){
            die("Website is down, sorry.");
        }
    }
?><!doctype html>
<html lang="en">
<head>
    <title>What do you like to post?</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<p><a href="index.php">Back</a></p>
<form action="" method="post">

    <h1>Upload Post</h1>

<div id="divFormUpload"></div>
    <form id="uploadForm" action="" method="post" enctype="multipart/form-data" id="uploadForm">

        <?php if (isset($error)): ?>
            <div><?php echo $error; ?></div>
        <?php endif; ?>

    <!--<input type="text" name="title" placeholder="Title">-->
    <input type="file" name="upload_file">
    <input type="text" name="description" placeholder="Description">
    <input type="submit" value="Upload">
</form>
<?php include_once("includes/footer.inc.php"); ?>
</body>
</html>
