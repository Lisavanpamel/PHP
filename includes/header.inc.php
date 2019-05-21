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
                <div class="right_actions">
                    <a href="upload.php">Upload</a>
                    <a href="edit_profile.php">Edit profile</a>
                    <a href="logout.php">Log out</a>
                    <!-- dit is de zoekbalk -->
                </div>

            </div>
            <form class="search" method="get" action="search.php">
              <input id="input_search" type="text" name="search" placeholder ="Search a user or post">
              <input id="btn_search"type="submit" value="">
            </form>
        </nav>

    </header>

</body>
</html>
