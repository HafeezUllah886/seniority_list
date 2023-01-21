<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
   
    <title>Delete</title>
  </head>
  <body>
<?php include('nav.html');?>
<?php
    include("connect.php");
    $id = $_GET['id'];
    $get = mysqli_query($con, "SELECT * FROM list where id = '$id'");
    $data = mysqli_fetch_array($get);
    ?>
    <div class="row" style="padding:10px">
    <h3>Delete following Record</h3>
    <p id="msg" class="text-danger"></p>
    <form method="post" enctype="multipart/form-data">
        <div class="row content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h2>Name: <?php echo $data['name']; ?></h2>
                    <h2>Father Name: <?php echo $data['fname']; ?></h2>
                    <h2>CNIC: <?php echo $data['cnic']; ?></h2>
                   <input type="hidden" name="id" value="<?php echo $id?>">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                <input type="submit" name="btn" class="btn btn-danger" value="Proceed">
            </div>
        </div>
    </form>
   
    
    </div>
    <?php
    if(isset($_POST['btn']))
    {
        $delete = mysqli_query($con, "DELETE FROM list WHERE id = '$id'");
        unlink($data['app']);
        unlink($data['degree']);
        unlink($data['acr']);
        unlink($data['asset']);
        rmdir('files/'.$data['cnic']);
        if($delete){
            ?>
            <script>
                window.open("index.php","_self");
            </script>
            <?php
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