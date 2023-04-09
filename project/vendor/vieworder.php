<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style_products.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body{
            background-image: url(bg.jpg);
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
 $query="SELECT * FROM product INNER JOIN orders ON orders.proid = product.proid INNER JOIN client ON client.userid =orders.userid where product.userid=$userid";
 $sql_cursor=mysqli_query($conn,$query);
//  from now use the code from previous pg client view page php as well a shtml part 
echo " <section class='products'>
           <h2> Ordered Items</h2>
           <div class='all-products'>";
        while($row=mysqli_fetch_assoc($sql_cursor))
        {   $orderid=$row['orderid'];
            $proid=$row['proid'];
            $name=$row['name'];
            $price=$row['price'];
            $details=$row['details'];
            $imgpath=$row['imgpath'];
           $username_client=$row['username'];
           $userid_client=$row['userid'];
           $adr_client=$row['adr'];
           $phn_client=$row['phn'];
           $ordered_date=$row['ordered_date'];



            echo " 

<div class='product' style='width:fit-content'>
            <img src='$imgpath'>
            <div class='product-info'>
                    <h5 style='color: brown;'> ORDER PLACED </h5>
                    <p style='font-size:medium; text-align: left;'> ORDER-ID: $orderid</P>
                    <p style='font-size:medium;text-align: left;'> PRODUCT-NAME : $name </P>
                    <p style='font-size:medium;text-align: left;'> PRODUCT-ID : $proid</P>
                    <p style='font-size:medium;text-align: left;'> ORDER-COST: ₹$price</p>
                    <p style='font-size:medium;text-align: left;'> ORDERED-TIME:$ordered_date</p>
                    <h5 style='color: brown;'> CLIENT DETAILS</h5>
                    <p style='color:rgb(146, 13, 139);font-size: medium;text-align: left; '> <span style='color:rgb(6, 55, 58);font-size: medium;'> USERNAME</span> :$username_client</p>
                    <p style='color:rgb(146, 13, 139);font-size: medium;text-align: left;' >  <span style='color:rgb(6, 55, 58);font-size: medium;'>USERID</span>: $userid_client</p>
                    <p  style='color:rgb(146, 13, 139);font-size: medium;text-align: left;'>  <span  style='color:rgb(6, 55, 58);font-size: medium;'>ADDRESS </span> :$adr_client </p>
                    <p style='color:rgb(146, 13, 139);font-size: medium;text-align: left;' >  <span style='color:rgb(6, 55, 58);font-size: medium;'> CONTACT</span>: $phn_client</p>
                    <h5 style='color: brown;'> ORDER STATUS </h5>
                 <a class='btn' href='add_deliver.php?orderid=$orderid&proid=$proid&clientid=$userid_client&ordered_date=$ordered_date'>MARK AS DELIVERED  </a>
            </div>
</div>";
        }

echo "</div>
     </section>";
 



?>
