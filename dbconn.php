<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "simpleminiproj1");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$connection) {
  die("Database Connection failed") . mysqli_connect_error();
} 
// else {
//   echo "Database Connected";
// }
