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

<?php
 include "menu.html";
 include_once "../shared/connection.php";
 session_start();
 $userid=$_SESSION['userdata']['userid'];
 $uname=$_SESSION['userdata']['username'];
 $adr=$_SESSION['userdata']['adr'];
 $phn=$_SESSION['userdata']['phn'];

 $query="select * from product join orders on product.proid=orders.proid where orders.userid=$userid";
 $sql_cursor=mysqli_query($conn,$query);
//  from now use the code from previous pg client view page php as well a shtml part 
echo " <section class='products'>
           <h4 style='text-align: center;'> ORDERS </h4>
           <div class='all-products'>";
        while($row=mysqli_fetch_assoc($sql_cursor))
        {   $orderid=$row['orderid'];
            $proid=$row['proid'];
            $name=$row['name'];
            $price=$row['price'];
            $details=$row['details'];
            $imgpath=$row['imgpath'];
            $ordered_date=$row['ordered_date'];
            
            echo " 

        <div class='product' style='width:fit-content'>
                <h5 style='color: green;'> ORDER PLACED </h5>
                <img src='$imgpath'>
                <div class='product-info'>
                    <h5 style='color: brown;'> ORDER DETAILS </h5>
                            <p style='font-size:medium; text-align: left;'> ORDER-ID: $orderid</P>
                            <p style='font-size:medium;text-align: left;'> PRODUCT-NAME : $name </P>
                            <p style='font-size:medium;text-align: left;'> PRODUCT-ID : $proid</P>
                            <p style='font-size:medium;text-align: left;'> ORDER-COST: ₹$price</p>
                            <p style='font-size:medium;text-align: left;'> ORDERED-TIME:$ordered_date</p>
                            <p  style='color:rgb(146, 13, 139);font-size: medium;text-align: left;'>  <span  style='color:rgb(6, 55, 58);font-size: medium;'> DELIVERED ADDRESS </span> :$adr </p>
                            <p style='color:rgb(146, 13, 139);font-size: medium;text-align: left;' >  <span style='color:rgb(6, 55, 58);font-size: medium;'> CONTACT</span>: $phn</p>
                            <a class='btn' href='deleteorder.php?orderid=$orderid'>cancel order </a>
                </div>
                    
                   
                    
            
        </div>";
        }
echo "</div>
     </section>";
 



?>
