<?php
  
session_start();
echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
if (isset($_SESSION['username'])) {
    echo '<script>window.location.href="home.php"</script>';
}
$mysqli = new mysqli('localhost','root' ,'', 'accounts' );
if(isset($_POST['Submit']))
{
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$query = "SELECT * FROM users WHERE email='$email' 
AND password='$password'";

$result = mysqli_query($mysqli,$query)or die(mysqli_error($mysql));
$num_row = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if( $num_row ==1 )
     {
        //  var_dump($row);
 $_SESSION['user_id']=$row['user_id'];
 $_SESSION['username']=$row['username'];
 $_SESSION['email']=$row['email'];
 $_SESSION['role']=$row['role'];
 $_SESSION['user_added_by']=$row['user_added_by'];
 echo '<script>window.location.href="Home.php"</script>';
 exit;
  }
  else
     {
 echo 'oops  can not do it';
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

    <title>Login</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
    <!-- <div class="container1">
        <img src="sinhgad-logo-colour-1.png" alt=""> 
    </div> -->
    <div class="box">
        <h1>Login</h1>
    </div>
    <form action="" method="post">
    <div class="wrapper">
        <div style="height: 350px" class="container">
            <div class="mb-3">
                <label class="form-label">email* :</label>
                <input type="email" class="form-control" name= "email" placeholder="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password* :</label>
                <input type="password" class="form-control" name= "password" placeholder="Password">
            </div>
            <div class="mb-3">
                <a href="form.php"> Registration </a>
                <!-- <input type="text" class="form-control" name= "password" placeholder="Password"> -->
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