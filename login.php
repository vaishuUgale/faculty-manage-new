<?php

session_start();
echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

$mysqli = new mysqli('localhost', 'root', '', 'accounts');
if (isset($_POST['Submit'])) {
   $username = trim($_POST['username']);
   $password = trim($_POST['password']);
   $query = "SELECT * FROM users WHERE username='$username' 
AND password='$password'";

   $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysql));
   $num_row = mysqli_num_rows($result);
   $row = mysqli_fetch_array($result);
   if ($num_row == 1) {
      //  var_dump($row);
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['user_added_by'] = $row['user_added_by'];
      echo '<script>window.location.href="Home.php"</script>';
      exit;
   } else {
      echo 'oops  can not do it';
   }
}

?>





<html>

<body>

   <!-- <p>This is another paragraph </p> -->



   <link rel="stylesheet" href="form.css" type="text/css">


   <link rel="stylesheet" href="form.css" type="text/css">
   <form id='login' action='login.php' method='post' accept-charset='UTF-8'>
      <fieldset>
         <legend>Login</legend>
         <input type='hidden' name='submitted' id='submitted' value='1' />
         <label for='username'>UserName*:</label>
         <input type='text' name='username' id='username' maxlength="50" />
         <label for='password'>Password*:</label>
         <input type='password' name='password' id='password' maxlength="50" />

         <a href="form.php"> Registration </a>



         <br>
         <input type='submit' name='Submit' value='Submit' />

      </fieldset>
   </form>

</body>

</html>