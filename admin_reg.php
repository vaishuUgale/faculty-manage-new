<?php
session_start();
// Create connection
include './functions.php';
$mysqli = new mysqli('localhost', 'root', '', 'accounts');
// Check connection

if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="home.php"</script>';
}else{
    if ($_SESSION['role']!='admin') {
        alert('Only Admins Allowed');
        echo '<script>window.location.href="home.php"</script>';
    }else{
        $user_id = $_SESSION['user_id'];
    }
}

if ($_SERVER['REQUEST_METHOD']   == 'POST') {
  if ($_POST['password'] == $_POST['confirmpassword']) {
    // success!
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);

    $exist = mysqli_query($mysqli, "select * from users where email='$email'");

    if (mysqli_num_rows($exist) == 0) {
      # code...

      $sql = "INSERT INTO `users` (`username`, `email`, `password`, `confirmpassword`,`role`,`user_added_by`) VALUES('$username','$email','$password','$confirmpassword','admin','$user_id');";

      if ($mysqli->query($sql) == true) {
        $last_id = $mysqli->insert_id;

        genID($last_id, "users", "user_id", "users");
        alert("Admin is registered Successfully");
      } else {
        // failed 

        alert("Admin is registration Failed");
      }
    }else{
      alert("Email Already Exists");

    }
  } else {
    // failed 

    alert("Please check password and confirm password");
  }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create an Admin Account</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
<?php include('./nav.php') ?>  
    <div class="box">
        <h1>Create an Admin Account</h1>
    </div>
    <form action="" method="post">
    <div class="wrapper">
        <div style="height: 360px" class="container">
            <div class="mb-3">
                <input type="text" class="form-control" name= "username" placeholder="Full Name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name= "email" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name= "password" placeholder="Password" autocomplete="new-password">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name= "confirmpassword" placeholder="Confirm Password" autocomplete="new-password">
            </div>
            <div class="mb-3">
                <div class="cont-1">
                    <input type="submit" class="form-control" name="Submit" id="input">
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>