<!-- 
    for one to delete the item one should get the details or reference to that product that we are going to delete 
    that is productid
    so in by viewing the product get the product id too   
 -->

 <?php
 $proid= $_GET['proid'];
 include_once "../shared/connection.php";
 $status=mysqli_query($conn,"delete from product where proid=$proid");
 if($status){
    echo "deleted Successfully !";
    header("location:view.php");
 }
 else{
    echo "Error while deleting the product";
    echo mysqli_error($conn);
 }
 ?>