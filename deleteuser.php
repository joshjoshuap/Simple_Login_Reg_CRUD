<?php
function deleteData()
{
  global $connection;
  $username = $_SESSION['username'];

  $deleteQuery = "DELETE FROM user_info WHERE username = '$username'";

  $sql = mysqli_query($connection, $deleteQuery);
  if (!$sql) {
    die("Delete Query Failed" . mysqli_error($connection));
  } else {
    $_SESSION['status'] = 'invalid';
    unset($_SESSION['username']);
    echo "<script>window.location.href='index.php'</script>";
  }
}
