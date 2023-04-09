<!DOCTYPE html><html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style_products.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    body{
        background-image: url(2.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style></head><body></body></html>

<?php
 include "menu.html";
 include_once "../shared/connection.php";
 session_start();
 $userid=$_SESSION['userdata']['userid'];
 $query="SELECT * FROM delivered_orders JOIN product ON delivered_orders.proid = product.proid INNER JOIN client ON client.userid =delivered_orders.clientid where client.userid=$userid";
 $sql_cursor=mysqli_query($conn,$query);
echo " <section class='products'>
           <h4 style='text-align: center'> SUCCESSFULL ORDERS </h4>
           <div class='all-products'>";
        while($row=mysqli_fetch_assoc($sql_cursor))
        {   $orderid=$row['orderid'];
            $proid=$row['proid'];
            $name=$row['name'];
            $price=$row['price'];
            $details=$row['details'];
            $imgpath=$row['imgpath'];
           $username_client=$row['username'];
           $userid_client=$row['clientid'];
           $adr_client=$row['adr'];
           $phn_client=$row['phn'];
           $ordered_date=$row['ordered_date'];
           $delivered_date=$row['delivered_date'];



            echo " 

       <div class='product' style='width:fit-content'>
            <h6 style='color: green;'> SUCCESSFULLY DELIVERED </h6>
            <img src='$imgpath'>
            <div class='product-info'>
                 <h5 style='color: brown;'> ORDER DETAILS </h5>
                    <p style='font-size:medium; text-align: left;'> ORDER-ID: $orderid</P>
                    <p style='font-size:medium;text-align: left;'> PRODUCT-NAME : $name </P>
                    <p style='font-size:medium;text-align: left;'> PRODUCT-ID : $proid</P>
                    <p style='font-size:medium;text-align: left;'> ORDER-COST: ₹$price</p>
                    <p style='font-size:medium;text-align: left;'> ORDERED-TIME:$ordered_date</p>
                    <p  style='color:rgb(146, 13, 139);font-size: medium;text-align: left;'>  <span  style='color:rgb(6, 55, 58);font-size: medium;'> DELIVERED-TIME </span> :$delivered_date </p>
                    <p  style='color:rgb(146, 13, 139);font-size: medium;text-align: left;'>  <span  style='color:rgb(6, 55, 58);font-size: medium;'> DELIVERED ADDRESS </span> :$adr_client </p>
                    <p style='color:rgb(146, 13, 139);font-size: medium;text-align: left;' >  <span style='color:rgb(6, 55, 58);font-size: medium;'> CONTACT</span>: $phn_client</p>
                    <a class='btn' href='make_review.php?orderid=$orderid & proid=$proid'> ADD REVIEW  </a>
            </div>
    

      </div>";
        }

echo "</div>
            
</section>";
 



?>
