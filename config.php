<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'php2019');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   $host = "localhost"; /* Host name */
   $user = "root"; /* User */
   $password = "root"; /* Password */
   $dbname = "php2019"; /* Database name */

   $con = mysqli_connect($host, $user, $password,$dbname);

   // Check connection
   if (!$con) {
   die("Connection failed: " . mysqli_connect_error());
   }
   ?>