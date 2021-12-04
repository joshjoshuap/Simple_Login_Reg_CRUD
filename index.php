<?php include "deleteuser.php"; ?>
<?php require("session.php");

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "simpleminiproj1");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$connection) {
  die("Database Connection failed") . mysqli_connect_error();
}

$usersData = "'" . $_SESSION['username'] . "'";
$displayQuery = "SELECT * FROM user_info WHERE username = $usersData ";
$sql = mysqli_query($connection, $displayQuery);

if (!$sql) {
  die('Query Failed');
}

if (isset($_POST['btn-delete'])) {
  deleteData();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <?php
    while ($sqlRow = mysqli_fetch_assoc($sql)) {

      echo 'Username: ' . $sqlRow['username'] . "<br/>";
      echo 'Password: ' . $sqlRow['pass'] . "<br/>";
      echo 'Firstname: ' . $sqlRow['firstname'] . "<br/>";
      echo 'Lastname: ' . $sqlRow['lastname'] . "<br/>";
      echo 'Age: ' . $sqlRow['age'] . "<br/>";
      echo 'Address: ' . $sqlRow['address'] . "<br/>";
    }

    ?>

    <a href="updateuser.php" class="btn btn-success">Update</a>

    <form action="index.php" method="post"><button class="btn btn-danger" name="btn-delete">Delete this Account</button></form>

    <form action="logout.php" method="post"><button class="btn btn-danger" href="logout.php">LOGOUT</button></form>
  </div>

</body>

</html>