<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
   
    <title>Import</title>
  </head>
  <body>
<?php include('nav.html');?>

    <div class="row" style="padding:10px">
    <h3>Import Data</h3>
    <p id="msg" class="text-danger"></p>
    <form method="post" enctype="multipart/form-data">
        <div class="row content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label  class="form-label">Select File to Upload</label>
                    <input type="file" name="import" class="form-control">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                <input type="submit" name="btn" class="btn btn-success" value="Upload">
            </div>
        </div>
    </form>
    </div>
    <?php
    include("connect.php");
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    if(isset($_POST['btn'])){
        $fill_allowed = ['xls','xlsx','csv'];
        $file_name = $_FILES['import']['name'];
        $checking = explode('.',$file_name);
        $ext = end($checking);
        if(in_array($ext,$fill_allowed)){
            $path = $_FILES['import']['tmp_name'];
            $sheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            $data = $sheet->getActiveSheet()->toArray();
            $header = 0;
            foreach($data as $row){
                $header++;
                if($header < 2){
                    
                }
                else{
                    $name = $row[2];
                    $fname = $row[3];
                    $cnic = $row[4];
                    $dob = $row[5];
                    $pno = $row[6];
                    $desg = $row[7];
                    $dist = $row[8];
                    $aq = $row[9];
                    $pq = $row[10];
                    $doa = $row[11];
                    $dor = $row[12];
                    $rem = $row[14];

                    $dob1 = date("Y-m-d", strtotime($dob));
                   
                      $doa1 = date("Y-m-d", strtotime($doa));
                      $dor1 = date("Y-m-d", strtotime($dor));
                    $check = mysqli_query($con, "SELECT * FROM list WHERE cnic = '$cnic'");
                    // if(mysqli_num_rows($check) > 0)
                    // {
                    //     echo "<p class='text-danger'>" . $cnic . " Already exists</p>";
                    // }
                    // else{
                        $q = "insert into list values
                                (null, '$name', '$fname', '$cnic', '$dob1', '$pno', 
                                '$desg', '$dist', '$aq', '$pq', '$doa1', '$dor1', '$rem', '1', '1', '1', '1', 0)";
                                $save = mysqli_query($con, $q);
                                if ($save)
                                {
                                    echo "<p class='text-success'>" .$name . ' saved </p>';
                                }
                    // }
                }
            }
        }
        else{
            echo "Invalid file";
        }
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