<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("classes/User.class.php");
include_once("classes/Db.class.php");

  $conn = Db::getInstance();
  $statement = $conn->prepare("select * from users");
  $statement->execute();
  $users = $statement->fetchAll();

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

<?php foreach($users as $user): ?>
  <a href="user.php?id=<?php echo $user['id']; ?>">
    <p><?php echo $user['user_name']; ?></p>
  </a>
<?php endforeach; ?>

</body>


</html>
