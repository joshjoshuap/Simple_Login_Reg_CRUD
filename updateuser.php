<?php require("session.php") ?>
<?php include "dbconn.php" ?>
<?php
$usersData = "'" . $_SESSION['username'] . "'";
$displayQuery = "SELECT * FROM user_info WHERE username = $usersData ";
$sql = mysqli_query($connection, $displayQuery);

if (!$sql) {
  die('Query Failed');
}

if (isset($_POST['btn-update'])) {
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $age = $_POST['age'];
  $address = $_POST['address'];

  $updateQuery = "UPDATE user_info SET
  pass= '$password', 
  firstname ='$firstname', 
  lastname ='$lastname', 
  age='$age',
  `address`= '$address'
  WHERE username = $usersData";

  $sql = mysqli_query($connection, $updateQuery);
  if (!$sql) {
    echo "Error";
    die("Update Query Failed" . mysqli_error($connection));
  } else {
    echo "<script>window.location.href='index.php'</script>";
  }
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
    <div class="box-container">
      <div>
        <form action="updateuser.php" method="post">
          <h2>LOGIN</h2>
          <?php
          while ($sqlRow = mysqli_fetch_assoc($sql)) {
          ?>

            <div class="form-group">
              <label for="username">
                <h4>Username</h4>
              </label>
              <input type="username" name="username" id="username" value="<?php echo $sqlRow['username'] ?>" disabled>
            </div>


            <div class="form-group">
              <label for="passwod">
                <h4>Password</h4>
              </label>
              <input type="password" name="password" id="password" value="<?php echo $sqlRow['pass'] ?>">
            </div>

            <div class="form-group">
              <label for="firstname">
                <h4>Firstname</h4>
              </label>
              <input type="firstname" name="firstname" id="firstname" value="<?php echo $sqlRow['firstname'] ?>">
            </div>

            <div class="form-group">
              <label for="lastname">
                <h4>Lastname</h4>
              </label>
              <input type="lastname" name="lastname" id="lastname" value="<?php echo $sqlRow['lastname'] ?>">
            </div>

            <div class="form-group">
              <label for="age">
                <h4>Age</h4>
              </label>
              <input type="age" name="age" id="age" value="<?php echo $sqlRow['age'] ?>">
            </div>

            <div class="form-group">
              <label for="address">
                <h4>Address</h4>
              </label>
              <input type="address" name="address" id="address" value="<?php echo $sqlRow['address'] ?>">
            </div>

          <?php } ?>

          <input type="submit" class="btn btn-success" name="btn-update" value="Update">
        </form>

        <a class="btn btn-primary" href="index.php">Home</a>
      </div>

    </div>

  </div>
</body>

</html>