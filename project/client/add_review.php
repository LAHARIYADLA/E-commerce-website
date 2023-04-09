<?php
session_start();
include_once "../shared/connection.php";
$orderid=$_GET['orderid'];
$proid=$_GET['proid'];
$clientid=$_SESSION['userdata']['userid'];
$rating=$_GET['rating'];
 $review=$_GET['review'];
 
 
  $status=mysqli_query($conn,"insert into ratings(orderid,proid,clientid,rating,review) values('$orderid','$proid','$clientid','$rating','$review')");
  if($status){
    echo "review submition  success";
    header("location:view_delivered_orders.php");
  }
  else{
    echo "error in sql";
    echo mysqli_error($conn);
  }

?>