<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
   
    <title>Update Files</title>
  </head>
  <body>
<?php include('nav.html');?>

    <div class="row" style="padding:10px">
    <h3>Update Attachment</h3>
    <p id="msg" class="text-danger"></p>
    <form method="post" enctype="multipart/form-data">
        <div class="row content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label  class="form-label">First Appointment</label>
                    <input type="file" name="app" class="form-control">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                <input type="submit" name="app-btn" class="btn btn-success" value="Upload">
            </div>
        </div>
    </form>
    <form method="post" enctype="multipart/form-data">
        <div class="row content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label  class="form-label">Degree</label>
                    <input type="file" name="degree" class="form-control">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                <input type="submit" name="degree-btn" class="btn btn-success" value="Upload">
            </div>
        </div>
    </form>
    <form method="post" enctype="multipart/form-data">
        <div class="row content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label  class="form-label">ACR</label>
                    <input type="file" name="acr" class="form-control">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                <input type="submit" name="acr-btn" class="btn btn-success" value="Upload">
            </div>
        </div>
    </form>
    <form method="post" enctype="multipart/form-data">
        <div class="row content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label  class="form-label">Asset</label>
                    <input type="file" name="asset" class="form-control">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                <input type="submit" name="asset-btn" class="btn btn-success" value="Upload">
            </div>
        </div>
    </form>
    </div>
    <?php
    include("connect.php");
    $id = $_GET['id'];
    $get = mysqli_query($con, "SELECT * FROM list where id = '$id'");
    $data = mysqli_fetch_array($get);
    $cnic = $data['cnic'];
    $path = 'files/' . $cnic;
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    if(isset($_POST['app-btn'])){
        $file1name = $path."/app";
        $file1ext = pathinfo($_FILES['app']['name'], PATHINFO_EXTENSION);
        $file1n =  $file1name . ".".$file1ext;
        move_uploaded_file($_FILES["app"]["tmp_name"],$file1n);
        $update = mysqli_query($con, "UPDATE list set app = '$file1n' where id = '$id'");
    }
    if(isset($_POST['degree-btn'])){
        $file1name = $path."/degree";
        $file1ext = pathinfo($_FILES['degree']['name'], PATHINFO_EXTENSION);
        $file1n =  $file1name . ".".$file1ext;
        move_uploaded_file($_FILES["degree"]["tmp_name"],$file1n);
        $update = mysqli_query($con, "UPDATE list set degree = '$file1n' where id = '$id'");
    }
    if(isset($_POST['acr-btn'])){
        $file1name = $path."/acr";
        $file1ext = pathinfo($_FILES['acr']['name'], PATHINFO_EXTENSION);
        $file1n =  $file1name . ".".$file1ext;
        move_uploaded_file($_FILES["acr"]["tmp_name"],$file1n);
        $update = mysqli_query($con, "UPDATE list set acr = '$file1n' where id = '$id'");
    }
    if(isset($_POST['asset-btn'])){
        $file1name = $path."/asset";
        $file1ext = pathinfo($_FILES['asset']['name'], PATHINFO_EXTENSION);
        $file1n =  $file1name . ".".$file1ext;
        move_uploaded_file($_FILES["asset"]["tmp_name"],$file1n);
        $update = mysqli_query($con, "UPDATE list set asset = '$file1n' where id = '$id'");
    }
    
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="assets/datatable/jquery.js"></script>
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>