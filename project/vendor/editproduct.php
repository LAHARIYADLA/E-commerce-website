<?php
session_start();
if(!isset($_SESSION['login_status']))
{
    echo "ILLEGAL ACCESS";
    die;
}
if($_SESSION['login_status']==false)
{
    echo "Unauthorised Attempt!";
    die;
}
include "menu.html";
 $uname=$_SESSION['userdata']['username'];
 echo "<h4 class='text-center text-white'> welcome $uname</h4>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body{
        background-color: cadetblue;
        background-image: url(bg.jpg);
        background-size: cover;
    }

    
</style>
</head>
<body>
    <?php
    include "../shared/connection.php";
    $proid=$_GET['proid'];
    $query="select * from product where proid=$proid";
    $sql_cursor=mysqli_query($conn,$query);
    if(mysqli_num_rows($sql_cursor) > 0)
    { 
       $data=mysqli_fetch_assoc($sql_cursor);
       ?>
     
       <div class="d-flex justify-content-center align-items-center vh-100">
      <form   class="p-3 text-center" action="edit_server.php" 
      enctype="multipart/form-data"
       method="post">
          <h3 class="text-center text-white">EDIT  PRODUCT</h3>
           <input type="hidden" name="proid" value="<?= $data['proid'] ?>" >
         <input class="form-control m-2 text-success" value="<?= $data['name'] ?>" type="text" name="product_name" placeholder="ENTER PRODUCT NAME"> 
         <input class="form-control m-2 text-success" value="<?= $data['price'] ?>"  type="text" name="product_price" placeholder="ENTER PRODUCT PRICE"> 
         <textarea class="form-control m-2 text-success  " name="product_details" id=""  rows="5" placeholder="product details anddescription">
         <?= $data['details'] ?> </textarea>
         <h6 class="text-center text-white">choose new to update above pic</h6>
         <img src="<?= $data['imgpath'] ?> " alt="" class="w-25 h-25">
         <input type="hidden" name="old-img" value="<?= $data['imgpath'] ?>" >
         <input class="form-control m-2" type="file" name="product_image"> 
          <div class="text-center"><button class="btn btn-danger"  >UPDATE</button></div>
      </form>
  </div>
  <?php

    }
    else echo " product not found the given proid";
    ?>

   
    
</body>
</html>