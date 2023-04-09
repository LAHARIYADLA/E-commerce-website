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
// session_start();
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
    <!--problem here with giving the extension as php is the it will  not autofill
it will there is a function in php
so temporarly change extension to html  -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form   class="p-3 text-center" action="upload_server.php" 
        enctype="multipart/form-data"
         method="post">
            <h3 class="text-center text-white">UPLOAD PRODUCT</h3>
             
           <input class="form-control m-2 text-success" type="text" name="product_name" placeholder="ENTER PRODUCT NAME"> 
           <input class="form-control m-2 text-success" type="text" name="product_price" placeholder="ENTER PRODUCT PRICE"> 
           <textarea class="form-control m-2 text-success  " name="product_details" id=""  rows="5" placeholder="product details anddescription">
           </textarea>
           <input class="form-control m-2" type="file" name="product_image" > 
           <div class="text-center"><button class="btn btn-danger">UPLOAD</button></div>
        </form>
    </div>
</body>
</html>