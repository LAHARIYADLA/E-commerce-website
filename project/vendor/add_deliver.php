<?php
//orderid	clientid	proid	delivered_date		ordered_date -delivered_orders table
session_start();
include_once "../shared/connection.php";
$orderid=$_GET['orderid'];
$clientid=$_GET['clientid'];
$proid=$_GET['proid'];
$ordered_date=$_GET['ordered_date'];
$status=mysqli_query($conn,"insert into delivered_orders(orderid,clientid,proid,ordered_date) values('$orderid','$clientid','$proid','$ordered_date')");
include_once "../shared/connection.php";
$status2=mysqli_query($conn,"delete from orders where orderid=$orderid");
if($status && $status2){
    echo " Successfully added to delivered_orders ";
    header("location:view_delivered_orders.php");
}
else{
    echo "error in sql";
    echo mysqli_error($conn);
  }
 
?>