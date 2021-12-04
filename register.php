<?php include "dbconn.php";
if (isset($_POST['btn-submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $age = $_POST['age'];
  $address = $_POST['address'];


  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);
  $firstname = mysqli_real_escape_string($connection, $firstname);
  $lastname = mysqli_real_escape_string($connection, $lastname);
  $age = mysqli_real_escape_string($connection, $age);
  $address = mysqli_real_escape_string($connection, $address);


  $encryptPassword = crypt($password, '$5$rounds=5000$usesomesillystringforsalt$');

  $insertQuery = "INSERT INTO user_info(username, pass, firstname, lastname, age, `address`) VALUES ('$username', '$encryptPassword','$firstname','$lastname','$age', '$address')";
  $sql = mysqli_query($connection, $insertQuery);

  if (!$sql) {
    echo "Query Failed";
    echo "" . mysqli_error($connection); // this check if the query is null or inputs has incorrect
  }

  echo "<script>window.location.href='login.php'</script>";
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
        <form action="register.php" method="post">
          <h2>LOGIN</h2>

          <div class="form-group">
            <label for="username">
              <h4>Username</h4>
            </label>
            <input type="text" name="username" id="username">
          </div>


          <div class="form-group">
            <label for="password">
              <h4>Password</h4>
            </label>
            <input type="password" name="password" id="password">
          </div>

          <div class="form-group">
            <label for="firstname">
              <h4>Firstname</h4>
            </label>
            <input type="text" name="firstname" id="firstname">
          </div>

          <div class="form-group">
            <label for="lastname">
              <h4>Lastname</h4>
            </label>
            <input type="text" name="lastname" id="lastname">
          </div>

          <div class="form-group">
            <label for="age">
              <h4>Age</h4>
            </label>
            <input type="text" name="age" id="age">
          </div>

          <div class="form-group">
            <label for="address">
              <h4>Address</h4>
            </label>
            <input type="text" name="address" id="address">
          </div>

          <button class="btn btn-success" type="submit" name="btn-submit">Register</button>
        </form>

        <a class="btn btn-primary" href="login.php">Login</a>
      </div>

    </div>

  </div>
</body>

</html>