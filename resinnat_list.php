<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo '<script>window.location.href="login.php"</script>';
}
include './conn.php';
include './functions.php';
$user_id = $_SESSION['user_id'];
$link="";
$sql = "SELECT * FROM `inpaperpublication` WHERE inpaperpublication_user_id='$user_id'";
if (isset($_GET['admin'])) {
  if($_SESSION['role']=='admin') {
  $sql="SELECT * FROM `inpaperpublication`";
  $link="?admin=true";
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

  <title>My International Research Paper Report</title>
</head>

<body>
<?php include('./nav.php') ?>  
  <div class="box">
    <h1>My International Research Paper Report</h1>
  </div>
  <div class="container">
  <div class="btn_container d-flex justify-content-end">
    <a href="./export/Res_innat_exp.php<?php echo $link ?>" class="btn btn-primary"><i class="fa fa-cloud-download" aria-hidden="true"></i> Export</a>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Author 1</th>
          <th scope="col">Author 2</th>
          <th scope="col">Paper Title</th>
          <th scope="col">Name of Journal</th>
          <th scope="col">Date of publication</th>
          <th scope="col">Volume</th>
          <th scope="col">No.of Pages</th>
          <th scope="col">DOI</th>
          <th scope="col">Submitted By</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody class="table-light">
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($query)) {

        ?>
          <tr>
            <th scope="row"><?php echo $i;  ?></th>
            <td><?php echo $row['Author1']; ?></td>
            <td><?php echo $row['Author2'] ?></td>
            <td><?php echo $row['PaperTitle'] ?></td>
            <td><?php echo $row['JournalName'] ?></td>
            <td><?php echo $row['DOP'] ?></td>
            <td><?php echo $row['Volume'] ?></td>
            <td><?php echo $row['Pagenos'] ?></td>
            <td><?php echo $row['DOI'] ?></td>
            <td><?php echo get_Added_Name($row['inpaperpublication_user_id']); ?></td>
            <td><a href="<?php echo "IPP.php?up_id=".$row['inpaperpublication_id'] ?>">Edit</a></td>
            <td><a href="<?php echo "delete/resinnat_del_.php?id=".$row['inpaperpublication_id'] ?>">Delete</a></td>

          </tr>
        <?php
          $i++;
        }
        ?>

      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->
  <script src="https://kit.fontawesome.com/dc7c5d3095.js" crossorigin="anonymous"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>