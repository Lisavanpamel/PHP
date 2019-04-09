<?php
/* hier komt nog de bewerkingsfunctie voor een user */



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Profile</title>
</head>
<body>

<!-- Include header -->
<?php include_once("includes/header.inc.php"); ?>
<!-- HIER MOET NOG INCLUDE ERROR KOMEN -->

    <form method="post" action="" enctype="multipart/form-data" class="edit_profile">
        <h2>Edit profile</h2>
        <label for="profileImg">My profile picture</label>
        <img src="" alt="profiel foto">
        <input type="file" name="profileImg" id="profileImg" accept="image/gif, image/jpeg, image/png, image/jpg">

        <div class="formitem">
            <label for="firstname">firstname</label>
            <input type="text" name="firstname" id="firstname" value="">
        </div>

        <div class="formitem">
            <label for="lastname">lastname</label>
            <input type="text" name="lastname" id="lastname" value=""> 
        </div>

        <div class="formitem">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="">
        </div>

        <input type="submit" name="edit" value="Edit">
    </form>

    <form method="post" action="" class="edit_profile">
        <h2>Change Password</h2>
        <div class="formitem">
        <label for="password">New password</label>
        <input type="password" name="password" id="password" placeholder="New password">
    </div>

    <div class="formitem">
        <label for="repassword">Retype New password</label>
        <input type="password" name="repassword" id="repassword" placeholder="Retype New password">
    </div>

        <input type="submit" name="passwordedit" value="Edit">
    </form>
</body>
</html>