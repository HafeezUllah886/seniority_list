<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/datatable/datatable.min.css">
    <link rel="stylesheet" href="assets/datatable/buttons.min.css">

    <title>List</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Seniority List</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">View</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">Add New</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="export.php">Export Data</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="row" style="padding:10px">
        <div class="col-sm-12">
          <div style="overflow:auto;">
            <table id="table">
                <thead>
                    <th>Ser</th>
                    <th>Name</th>
                    <th>F/Name</th>
                    <th>CNIC</th>
                    <th>DOB</th>
                    <th>P/No</th>
                    <th>Designation</th>
                    <th>District</th>
                    <th>A/Q</th>
                    <th>P/Q</th>
                    <th>DOA</th>
                    <th>DOR</th>
                    <th>R/S</th>
                    <th>Remarks</th>
                    <th>Files</th>
                </thead>
                <tbody>
                  <?php
                    include('connect.php');
                    $get = mysqli_query($con, "Select * from list ORDER BY doa, birth ASC");
                    $ser = 0;
                    while ( $row = mysqli_fetch_array($get) ) {
                      $ser += 1;
                      $dob = $row['birth'];
                      $doa = $row['doa'];
                      $dor = $row['dor'];
                      $dob1 = date("d-m-Y", strtotime($dob));
                      $doa1 = date("d-m-Y", strtotime($doa));
                      $dor1 = date("d-m-Y", strtotime($dor));

                      $diff = abs(strtotime($row['dor']) - strtotime($row['doa']));
                      $years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                      ?>
                      <tr>
                        <td><?php echo $ser; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['cnic']; ?></td>
                        <td><?php echo $dob1; ?></td>
                        <td><?php echo $row['pno']; ?></td>
                        <td><?php echo $row['desg']; ?></td>
                        <td><?php echo $row['dist']; ?></td>
                        <td><?php echo $row['aq']; ?></td>
                        <td><?php echo $row['pq']; ?></td>
                        <td><?php echo $doa1; ?></td>
                        <td><?php echo $dor1; ?></td>
                        <td><?php echo $years .'Y '. $months . 'M '. $days . 'D' ?></td>
                        <td><?php echo $row['rem']; ?></td>
                        <td>
                          <a href="<?php echo $row['app'];?>">1st App</a>,
                          <a href="<?php echo $row['degree'];?>">Degree</a>,
                          <a href="<?php echo $row['acr'];?>">ACR</a>,
                          <a href="<?php echo $row['asset'];?>">Asset</a>
                        </td>
                      </tr>
                      <?php
                    }
                  ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="assets/datatable/jquery.js"></script>
    <script src="assets/datatable/datatable.min.js"></script>
    <script src="assets/datatable/jszip.min.js"></script>
    <script src="assets/datatable/pdfmaker.min.js"></script>
    <script src="assets/datatable/vfs_fonts.min.js"></script>
    <script src="assets/datatable/html5_buttons.min.js"></script>
    <script src="assets/datatable/buttons.min.js"></script>
    <script src="assets/datatable/print.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
      $(document).ready(function() {
    $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "bAutoWidth": false,
        "ordering": false
    } );
} );
    </script>
  </body>
</html>