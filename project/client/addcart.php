<?php
session_start();
$userid=$_SESSION['userdata']['userid'];
include_once "../shared/connection.php";
$proid=$_GET['proid'];
$status=mysqli_query($conn,"insert into cart(userid,proid) values($userid,$proid)");
if($status){
    echo " Successfully added to cart ";
    header("location:view.php");
}
else{
    echo "error in sql";
    echo mysqli_error($conn);
  }

?>