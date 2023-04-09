<?php
session_start();
include "../shared/connection.php";
$proid=$_POST['proid'];
$name=$_POST['product_name'];
$price=$_POST['product_price'];
$details=$_POST['product_details'];
$userid=$_SESSION['userdata']['userid'];
$new_image=$_FILES['product_image']['name'];
$old_image=$_POST['old-img'];
// here if the new image is not given then old image will be restored 
if($new_image !="")
{
    $prefix_path="../shared/images/";
    $file_name=$prefix_path.$_SESSION['userdata']['userid']."-".date("d-m-Y-H-i-s")."-".$_FILES['product_image']['name'];
    move_uploaded_file($_FILES['product_image']['tmp_name'],$file_name);
}
else {
    $file_name=$old_image;
}

$status= mysqli_query($conn,"update product SET name='$name',price='$price',details='$details',imgpath='$file_name' WHERE proid='$proid'");
if( !$status){
    echo "error in connection";
     echo mysqli_error($conn); 
    die;
}

    echo "product uploaded successfully";
    header("location:view.php");


?>