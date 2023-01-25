<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
   
    <title>Update Employee</title>
  </head>
  <body>
  <?php 
  include('nav.html');
  include('connect.php');
  $id = $_GET['id'];
  $data1 = mysqli_query($con, "SELECT * from list where id = '$id'");
  $data = mysqli_fetch_array($data1);
  ?>
    <div class="row" style="padding:10px">
    <h3 class="text-center">Edit Entry</h3>
    <p id="msg" class="text-danger"></p>
    <form method="post" id="form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name of Employee</label>
                    <input type="text" id="name" value="<?php echo $data['name']?>" name="name" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="fname" class="form-label">Father Name</label>
                    <input type="text" id="fname" value="<?php echo $data['fname']?>" name="fname" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="cnic" class="form-label">CNIC No.</label>
                    <input type="text" require id="cnic" value="<?php echo $data['cnic']?>" name="cnic" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Bith</label>
                    <input type="date" id="dob" value="<?php echo $data['birth']?>" onfocusout="abc()" name="dob" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="pno" class="form-label">Personal Number</label>
                    <input type="number" value="<?php echo $data['pno']?>" id="pno" name="pno" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="desg" class="form-label">Designation</label>
                    <input type="text" id="desg" value="<?php echo $data['desg']?>" name="desg" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="dist" class="form-label">District</label>
                    <input type="text" id="dist" value="<?php echo $data['dist']?>" name="dist" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="aq" class="form-label">Academic Qualification</label>
                    <input type="text" id="aq" name="aq" value="<?php echo $data['aq']?>" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="pq" class="form-label">Professional Qualification</label>
                    <input type="text" id="pq" value="<?php echo $data['pq']?>" name="pq" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="doa" class="form-label">Date of Appointment</label>
                    <input type="date" id="doa" value="<?php echo $data['doa']?>" name="doa" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="dor" class="form-label">Date of Retirement</label>
                    <input type="date" id="dor" name="dor" value="<?php echo $data['dor']?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="rem" class="form-label">Remarks</label>
                    <input type="text" id="rem" value="<?php echo $data['rem']?>" name="rem" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="filen" class="form-label">File Number</label>
                    <input type="number" id="filen" value="<?php echo $data['filenum']?>" name="filen" class="form-control">
                    <input type="hidden" id="id" value="<?php echo $data['id']?>" name="id">
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="assets/datatable/jquery.js"></script>
    <script src="assets/moment.min.js"></script>
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>

$("#form").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: 'update.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            if(data == 'save')
            {
                window.location.reload();
            }
            else{
                $("#msg").html(data);
            }
            
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

function abc(){
    var dob = $("#dob").val();
    var newDate = moment(dob, "YYYY-MM-DD").add(60, 'years').format('DD-MM-YYYY');
    var newDate1 = moment(newDate, "DD-MM-YYYY").subtract(6, 'days').format('YYYY-MM-DD');
    $("#dor").val(newDate1);
}
    </script>
  </body>
</html>