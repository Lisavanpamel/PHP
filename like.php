<?php 

include_once("classes/Post.class.php");
include_once("index.php");
include_once("classes/Db.class.php");
include_once("js/jquery.min.js");


	// connect to the database
	$con = mysqli_connect('localhost', 'root', 'root', 'php2019');

	if (isset($_POST['liked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($con, "SELECT * FROM posts WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($con, "INSERT INTO likes (userid, postid) VALUES (1, $postid)");
		mysqli_query($con, "UPDATE posts SET likes=$n+1 WHERE id=$postid");

		echo $n+1;
		exit();
	}
	if (isset($_POST['unliked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($con, "SELECT * FROM posts WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($con, "DELETE FROM likes WHERE postid=$postid AND userid=1");
		mysqli_query($con, "UPDATE posts SET likes=$n-1 WHERE id=$postid");
		
		echo $n-1;
		exit();
	}

	// Retrieve posts from the database
	$posts = mysqli_query($con, "SELECT * FROM posts");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
</body>
</html>