<!-- navigatie (Nav) -->

<?php
/* Nav tonen na inlogscherm */
    //include_once("");

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Nav</title>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <!--<a class="logo" href="index.php"><img src="images/logo.svg" alt="logo"></a>-->
                <a href="index.php">Home</a>
                <form class="search" method="get" action="search.php">
                  <input type="text" name="search" placeholder ="Search a user or post">
                  <input class="btn_search"type="submit" value="">
                </form>
                <div class="right_actions">
                    <a href="upload.php">Upload</a>
                    <a href="edit_profile.php">Edit profile</a>
                    <a href="logout.php">Log out</a>
                </div>
                  <!-- dit is de zoekbalk -->

            </div>
        </nav>
    </header>
</body>
</html>
