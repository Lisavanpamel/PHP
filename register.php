<?php




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign in</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <header>
  <h1>Sign in</h1>
  </header>

  <form method="post" action="">
    <!-- username -->
    <div class="input">
    <label>Username</label>
    <input type="text"name="username">
  </div>

  <!-- e-mail -->
  <div class="input">
    <label>E-mail</label>
    <input type="text"name="email">
  </div>

  <!-- birthdate -->
  <div class="input">
    <label>Birthdate</label>
    <input type="date"name="birthdate">
  </div>

  <!-- country -->
    <div class="input">
      <label>Country</label>
      <input type="country"value="Belgium">
    </div>

    <!-- password -->
    <div class="input">
      <label>Password</label>
      <input type="password"name="password">
    </div>
    <!-- confirm password -->
    <div class="input">
      <label>Confirm Password</label>
      <input type="password"name="password_confirm">
    </div>

      <!-- submit button -->
      <input type="submit" value="Sign in">
  </form>

</body>


</html>
