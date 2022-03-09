
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Conference Attended By</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
    <!-- <div class="container1">
        <img src="sinhgad-logo-colour-1.png" alt=""> 
    </div> -->
    <div class="box">
        <h1>Conference Attended By</h1>
    </div>
    
    <div class="wrapper">
        <div class="container">
            <div class="mb-3">
                <label class="form-label">Name of Faculty :</label>
                <select class="form-control" name="ConAttended">
                    <option value="option 1">option 1</option>
                    <option value="option 2">option 2</option>
                    <option value="option 3">option 3</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Conference Name :</label>
                <input type="text" class="form-control" name= "Conname" placeholder="Conference Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Date :</label><br>
                <div class="cont">
                    <label class="form-label" id="item1">From</label>
                    <input type="date" name="fromdate" class="form-control" >
                    <label class="form-label" id="item1">To</label>
                    <input type="date" name="todate" class="form-control" >
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Level :</label>
                    <select class="form-control" name="level">
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="Internatinal">International</option>
                    </select>
            </div>
            <div class="mb-3">
                <div class="cont-1">
                    <input type="submit" class="form-control" name="Submit" id="input">
                </div>

            </div>
        </div>
    </div>
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