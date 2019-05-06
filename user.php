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
    <title>User</title>
</head>

<style>

.user_header
{
  width: 100%;
  height: 200px;
  background-color: grey;
}

.profile_pic
{
  width: 100px;
  height: 100px;
  border: 1px solid #000;
  border-radius: 200px;
}

.profile_pic, .user_header p
{
  position:relative;
  top: 10%;
  left: 35%;
}

.about_user
{
  margin-top: 50px;
}

h1
{
  color: red;
  font-weight: bold;
}

h2
{
  margin-top: 20px;
  color: red;
}


</style>

<body>
<?php include_once("includes/header.inc.php"); ?>
<!-- header waarin de profielfoto van de user zit -->
<div class="user_header">

<div class="profile_pic" style="background-image: url();"></div>
<br>
<p><?php echo $users['user_name']; ?></p>
</div>
<div class="about_user">
<h1>About</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
  fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<h2>Full name</h2>
  <p><?php echo $users['first_name'] . " " . $users['last_name']; ?></p>

<h2>Birthdate</h2>
<p><?php echo $users['birthdate']; ?></p>
</div>

<!-- alle posts van de user -->


</body>


</html>
