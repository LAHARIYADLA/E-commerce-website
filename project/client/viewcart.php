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
  </style>
</head>
<body>

</body>
</html>

<!-- 
    JOIN TABLE  an sql query lets understand the functinality of this first
       // select *  from product join cart
    this do adding all products which ever present to cart for 
    each cart item present 
    i.e product items will add by number of cart items times 
     this will give all combinations 


     now do on some conditions 
     here the useful condition is proid of cartdb and proid of productdb
    //  select * from product join cart on cart.proid=product.proid
    for example now for query below 
    // select * from product join cart on cart.userid=product.userid
    to this query there will no items as userid in cart and product belongs to client and vendor respectively
    so they are not same hence there will be no items 
-->

<?php
 include "menu.html";
 include_once "../shared/connection.php";
 session_start();
 $userid=$_SESSION['userdata']['userid'];
 $uname=$_SESSION['userdata']['username'];
 $query="select * from product join cart on product.proid=cart.proid where cart.userid=$userid";
 $sql_cursor=mysqli_query($conn,$query);
//  from now use the code from previous pg client view page php as well a shtml part 
echo " <section class='products'>
           <h4 style='text-align: center;'>Items in cart</h4>
           <div class='all-products'>";
        while($row=mysqli_fetch_assoc($sql_cursor))
        {   $cartid=$row['cartid'];
            $proid=$row['proid'];
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
                            <a class='btn' href='deletecart.php?cartid=$cartid'>REMOVE FROM<i class='bi-cart'></i></a>
                            <a class='btn' href='addorder.php? proid=$proid'> ORDER NOW </a>

                        </div>
            
             </div>";
        }
echo "</div>
     </section>";
 



?>
