<?php
 $orderid=$_GET['orderid'];
 include_once "../shared/connection.php";
 $status=mysqli_query($conn,"delete from orders where orderid=$orderid");
 if($status){
    echo "deleted Successfully !";
    header("location:vieworders.php");
 }
 else{
    echo "Error while deleting the product";
    echo mysqli_error($conn);
 }
 ?>