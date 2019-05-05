<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("classes/User.class.php");
include_once("classes/Db.class.php");


$u = new User();
$user = $u->showUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>User</title>
</head>

<body>
<?php include_once("includes/header.inc.php"); ?>
<!-- header waarin de profielfoto van de user zit -->
<div class="user_header">
<div class="profile_pic" style="background-image: url();"></div>
<p><?php echo $user['user_name']; ?></p>
</div>

<h1>About<h1>
<p><!-- biografie over de user --></p>

<h2>Full name<h2>
  <p><?php echo $user['first_name'] . " " . $user['last_name']; ?></p>

<h2>Birthdate</h2>
<p><?php echo $user['birthdate']; ?></p>


<!-- alle posts van de user -->



</body>


</html>
