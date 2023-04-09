

<?php
 $cartid=$_GET['cartid'];
 include_once "../shared/connection.php";
 $status=mysqli_query($conn,"delete from cart where cartid=$cartid");
 if($status){
    echo "deleted Successfully !";
    header("location:viewcart.php");
 }
 else{
    echo "Error while deleting the product";
    echo mysqli_error($conn);
 }
 ?>
