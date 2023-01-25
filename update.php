<?php
include('connect.php');
$id = $_POST['id'];
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
$filen = $_POST['filen'];

if(!$cnic){
    echo "CNIC Required";
    die();
}
$exist_check = mysqli_query($con, "select * from list where cnic = '$cnic' and id != '$id'");
if(mysqli_num_rows($exist_check) > 0){
  echo "CNIC Number Already Exists";
  die();
}


$q = "update list set name = '$name', fname = '$fname', cnic = '$cnic', birth = '$dob', pno = '$pno', desg = '$desg', dist = '$dist', aq = '$aq', pq = '$pq', doa = '$doa', dor = '$dor', rem = '$rem', filenum = '$filen' where id = '$id'";
$save = mysqli_query($con, $q);
if($save){
  echo "save";
}
else{
  echo "Error";
}


?>
