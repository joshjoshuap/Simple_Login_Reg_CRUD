<?php include "dbconn.php";
session_start();

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
  $_SESSION['status'] = "invalid";
}

if ($_SESSION['status'] == 'valid') {
  echo "<script>window.location.href='index.php'</script>";
}

if (isset($_POST['btn-submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = mysqli_real_escape_string($connection, $password);

  $encryptPassword = crypt($password, '$5$rounds=5000$usesomesillystringforsalt$'); // encryption

  if (empty($username) || empty($password)) {
    echo "Enter your username and password";
  } else {
    $validate = "SELECT * FROM user_info WHERE username = '$username' AND pass = '$encryptPassword'";

    $sql = mysqli_query($connection, $validate);
    $rowValidate = mysqli_fetch_array($sql);

    if (mysqli_num_rows($sql) > 0) {

      $_SESSION['status'] = 'valid';
      $_SESSION['username'] = $rowValidate['username'];


      echo "<script>window.location.href='index.php'</script>";
    } else {
      $_SESSION['status'] = 'invalid';
    }
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
        <form action="login.php" method="post">
          <h2>LOGIN</h2>

          <div class="form-group">
            <label for="username">
              <h4>Username </h4>
            </label>
            <input type="text" name="username" id="username">
          </div>


          <div class="form-group">
            <label for="password">
              <h4>Password</h4>
            </label>
            <input type="password" name="password" id="password">
          </div>

          <button class="btn btn-primary" type="submit" name="btn-submit">Login</button>
        </form>

        <a class="btn btn-success" href="register.php">Register</a>
      </div>
    </div>
  </div>
</body>

</html>