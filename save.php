<?php
include('connect.php');
$name = $_POST['name'];
$fname = $_POST['fname'];
$cnic = $_POST['cnic'];
$dob = $_POST['dob'];
$pno = $_POST['pno'];
$desg = $_POST['desg'];
$dist = $_POST['dist'];
$aq = $_POST['aq'];
$pq = $_POST['pq'];
$doa = $_POST['doa'];
$dor = $_POST['dor'];
$rem = $_POST['rem'];

if(!$cnic){
    echo "CNIC Required";
    die();
}
$exist_check = mysqli_query($con, "select * from list where cnic = '$cnic'");
if(mysqli_num_rows($exist_check) > 0){
  echo "CNIC Number Already Exists";
  die();
}
$path = "files/".$cnic;

$file1 = 0;
$file2 = 0;
$file3 = 0;
$file4 = 0;
$file1name = $path."/app";
$file2name = $path."/degree";
$file3name = $path."/acr";
$file4name = $path."/asset";
$file1ext = "";
$file2ext = "";
$file3ext = "";
$file4ext = "";
if(empty($_FILES['app']['name']) || empty($_FILES['degree']['name']) || empty($_FILES['acr']['name']) || empty($_FILES['asset']['name'])){
    echo "Select All files to Upload";
    die();
}
else{
  mkdir($path = "files/".$cnic, 0777, true);
    
        $file1ext = pathinfo($_FILES['app']['name'], PATHINFO_EXTENSION);
        $file1n =  $file1name . ".".$file1ext;
        move_uploaded_file($_FILES["app"]["tmp_name"],$file1n);
      $file1 = 1;
    
        $file2ext = pathinfo($_FILES['degree']['name'], PATHINFO_EXTENSION);
        $file2n =  $file2name . ".".$file2ext;
        move_uploaded_file($_FILES["degree"]["tmp_name"], $file2n);
      $file2 = 1;
   
        $file3ext = pathinfo($_FILES['acr']['name'], PATHINFO_EXTENSION);
        $file3n =  $file3name . ".".$file3ext;
        move_uploaded_file($_FILES["acr"]["tmp_name"], $file3n);
      $file3 = 1;

        $file4ext = pathinfo($_FILES['asset']['name'], PATHINFO_EXTENSION);
        $file4n =  $file4name . ".".$file4ext;
        move_uploaded_file($_FILES["asset"]["tmp_name"], $file4n);
      $file4 = 1;
   
}
if($file1 == 1 && $file2 == 1 && $file3 == 1 && $file4 == 1){
$q = "insert into list values
(null, '$name', '$fname', '$cnic', '$dob', '$pno', 
'$desg', '$dist', '$aq', '$pq', '$doa', '$dor', '$rem', '$file1n', '$file2n', '$file3n', '$file4n')";

$save = mysqli_query($con, $q);
if($save){
  echo "save";
}
else{
  echo "Error";
}
}

?>
