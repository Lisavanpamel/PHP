<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("classes/User.class.php");
require_once("classes/Db.class.php");
// sessie opstarten
session_start();



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
  $user->setPassword_confirm($password_confirm);
  $user->getPassword_confirm();
  try{
    $result = $user->register();
  }
  catch(Exception $t){
    $error =  $t->getMessage();
  }

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
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include_once("includes/header.inc.php"); ?>


  <form method="post" action="">
    <h1>Sign in</h1>
    <!-- foutboodschap wanneer niet alle velden zijn ingevuld -->
    <?php if(isset($error)): ?>
    <div class="error_signin"><?php echo $error; ?></div>
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
      <br>
      <p>Your password need at least 8 characters</p>
    </div>

    <!-- confirm password -->
    <div class="input">
      <label>Confirm Password</label>
      <br>
      <input type="password"name="password_confirm"value="">
    </div>


      <!-- submit button -->
      <input class="submit" type="submit" value="Sign in">

  </form>

</body>


</html>
