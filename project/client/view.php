<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style_products.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <style>
     body{
        background-image: url(4.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    .ip1,.ip2{
        text-align: center;
        width: 50%;
        height:50px;
        padding: 4px;
        margin: 3px;
        border-radius: 5px;
        background-color:rgba(59, 9, 106, 0.527);
        color: white;
    }
    .ip2{
        border: 2px solid darkcyan;
    }
    .ip1{
        border: 0 0 0 2px;
        border-bottom: solid darkcyan;
    }

    ::placeholder{
        color: white;
        opacity: 0.5;
    }
    .fil{
        position:relative;
        left: 40%;
    }
    </style></head><body></body></html>

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
?>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM product WHERE product.name LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
else {
    $query = "SELECT * FROM product ";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include "../shared/connection.php";
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>
<?php
 //include "../shared/connection.php";
 //session_start();
 $userid=$_SESSION['userdata']['userid'];
 $uname=$_SESSION['userdata']['username'];
 //$sql_cursor=mysqli_query($conn,"select * from product");
 
 echo " <section class='products'>
       <div style='width:50%;height:10%;' class='fil'>
            <form action='view.php' method='post'>
            <input type='text' class='ip1' name='valueToSearch' placeholder='Value To Search'><br>
            <input type='submit'  class='ip2' name='search' value=' 🔍 search'>
            </form>
         </div>   
        
           <div class='all-products'>";
               // while($row=mysqli_fetch_assoc($sql_cursor))
               while($row = mysqli_fetch_array($search_result))
                {   $proid=$row['proid'];// this used later while editing and deleting as reference
                    $name=$row['name'];
                    $price=$row['price'];
                    $details=$row['details'];
                    $imgpath=$row['imgpath'];
                    echo "
            
            <div class='product'>
            <img src='$imgpath'>
                        <div class='product-info'>
                                <h4 class='product-title'>$name</h4>
                                <p class='product-price' style='color: brown;'> ₹$price</p>
                                <p class='product-price'>$details</p>
                                <a class='product-btn' href='addcart.php?proid=$proid'>Add TO <i class='bi-cart'></i></a>
                                <a class='btn' href='addorder.php?proid=$proid'> ORDER NOW </a>
                        </div>
            
         </div>";
                }
echo "</div>
      </section>";
?>
<!-- here when I am doing add to cart means I need to add product id to cart
but again cart for individual user should be different from other 
so cart is some relation ship sheet which stores relation not the actual data 
userid   proid
  1        4
  2        4
  1        2
  2        1
 so based  on this relation how will you retrive
 our above table is many to many relation 
 1 user can be associated with multiple products
 1 product can be associated with multiple users
-->
