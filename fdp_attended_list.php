<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo '<script>window.location.href="login.php"</script>';
}
include './conn.php';
include './functions.php';
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM `fdpatt` WHERE fdpatt_user_id='$user_id'";
if (isset($_GET['admin'])) {
  if($_SESSION['role']=='admin') {
  $sql="SELECT * FROM `fdpatt`";
  }
}
$query = mysqli_query($mysqli, $sql);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="tables.css">

  <title>My Fdp Attendance Report</title>
</head>

<body>
<?php include('./nav.php') ?>  
  <div class="box">
    <h1>My Fdp Attendance Report</h1>
  </div>
  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name of Faculty</th>
          <th scope="col">FDP Name</th>
          <th scope="col">From Date</th>
          <th scope="col">To Date</th>
          <th scope="col">Level</th>
          <th scope="col">Added By</th>
          <th scope="col">File</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>
      <tbody class="table-light">
        <?php
        $i=1;
        while ($row = mysqli_fetch_assoc($query)) {
       
        ?>
          <tr>
            <th scope="row"><?php echo $i;  ?></th>
           <td><?php echo get_Added_Name($row['fdpatt_user_id']); ?></td>
           <td><?php echo $row['fdpname'] ?></td>
           <td><?php echo $row['fromdate'] ?></td>
           <td><?php echo $row['todate'] ?></td>
           <td><?php echo $row['level'] ?></td>
           <td><?php echo get_Added_Name($row['fdpatt_added_by']); ?></td>
           <td><a <?php echo $row['fdpatt_file']!=null?"href='".$row['fdpatt_file']."'":'' ?> target="_blank"><?php echo $row['fdpatt_file']!=null?'Go to file':'No file' ?></a></td>
           <td><a href="<?php echo "FDP_Attended.php?up_id=".$row['fdpatt_id'] ?>">Edit</a></td>

          </tr>
        <?php
        $i++;
        }
        ?>

      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>