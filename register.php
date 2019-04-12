<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("classes/User.class.php");
require_once("classes/Db.class.php");
// sessie opstarten
session_start();


$empty_field_error = false;
$strong_password_error = false;
$unequal_password_error = false;
$email_error = false;



// valideren of alle velden zijn ingevuld
if(!empty($_POST)){
  //return true;

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $birthdate = $_POST['birthdate'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];

  $user = new User();
  $user->setFirstname($firstname);
  $user->getFirstname();
  $user->setLastname($lastname);
  $user->getLastname();
  $user->setUsername($username);
  $user->getUsername();
  $user->setEmail($email);
  $user->getEmail();
  $user->setBirthdate($birthdate);
  $user->getBirthdate();
  $user->setPassword($password);
  $user->getPassword();
  $user->setPassword_comfirm($password_confirm);
  $user->getPassword_confirm();
  $result = $user->register();
}
  else{
    // foutboodschap tonen
    $empty_field_error = "Please, fill in all the fields";
  }

    // alles in orde? dan zullen we werken met getters en setters binnen User.class.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign in</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<style>

form
{
  position: absolute;
  left: 20%;
}

.input
{
  margin-top: 2em;
  font-size: 20px;
}

.input input
{
  width: 250px;
  height: 35px;
  font-size: 20px;
}

.submit
{
  width: 250px;
  height: 35px;
  font-size: 20px;
  margin-top: 2em;
  margin-bottom: 2em;
}

.error_signin
{
  width: 250px;
  padding: 15px;
  background-color: rgba(255,59,10,0.5);
  color: rgb(143,15,12);
}

</style>


<body>
<?php include_once("includes/header.inc.php"); ?>


  <form method="post" action="">
    <h1>Sign in</h1>
    <!-- foutboodschap wanneer niet alle velden zijn ingevuld -->
    <?php if(isset($empty_field_error)): ?>
    <div class="error_signin"><?php echo $empty_field_error; ?></div>
    <?php endif; ?>
    <!-- firstname -->
    <div class="input">
      <label>Firstname</label>
      <br>
      <input type="text"name="firstname"value="">
    </div>

    <!-- lastname -->
    <div class="input">
      <label>Lastname</label>
      <br>
      <input type="text"name="lastname"value="">
    </div>

    <!-- username -->
    <div class="input">
    <label>Username</label>
    <br>
    <input type="text"name="username"value="">
  </div>

  <!-- e-mail -->
  <div class="input">
    <label>E-mail</label>
    <br>
    <input type="text"name="email"placeholder="example@gmail.com">
  </div>
  <?php if(isset($email_error)): ?>
  <div class="error_signin"><?php echo $email_error; ?></div>
<?php endif; ?>

  <!-- birthdate -->
  <div class="input">
    <label>Birthdate</label>
    <br>
    <input type="date"name="birthdate">
  </div>


    <!-- password -->
    <div class="input">
      <label>Password</label>
      <br>
      <input type="password"name="password" value="">
    </div>
    <?php if(isset($strong_password_error)): ?>
    <div class="error_signin"><?php echo $strong_password_error; ?></div>
    <?php endif; ?>
    <!-- confirm password -->
    <div class="input">
      <label>Confirm Password</label>
      <br>
      <input type="password"name="password_confirm"value="">
    </div>
    <?php if(isset($unequal_password_error)): ?>
    <div class="error_signin"><?php echo $unequal_password_error;?></div>
    <?php endif; ?>

      <!-- submit button -->
      <input class="submit" type="submit" value="Sign in">

  </form>

</body>


</html>

