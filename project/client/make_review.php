<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style_products.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
	body{
		background-image: url(1.jpeg);
	}
	
	.btn{
  width: fit-content;
  background-color: red;
  border: 2px solid #630c6d;
  border-radius: 3px;
  color:white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
	
</style>
</head>
<body>

</body>
</html>

<?php

include_once "../shared/connection.php";
session_start();
$orderid=$_GET['orderid'];
$proid=$_GET['proid'];
$userid=$_SESSION['userdata']['userid'];
$query="SELECT * FROM delivered_orders JOIN product ON delivered_orders.proid = product.proid INNER JOIN client ON client.userid =delivered_orders.clientid where orderid=$orderid";
$sql_cursor=mysqli_query($conn,$query);
echo " 
 <div class='products'>
    <h4 style='color:red;padding:5px;text-align: center;'> SUBMIT YOUR REVIEW TO PRODUCT RECIEVED</h4>";
	   while($row=mysqli_fetch_assoc($sql_cursor))
	   {  
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
    <form action='add_review.php?' method='GET'>
		<div class='container products'style='width: 400px;color: white;padding: 5px;align-items: center;margin-left: 30%;'>
			<input type=' hidden '  name='orderid' value='$orderid' style='display:none;'>
			<input type=' hidden ' name='proid' value='$proid'style='display:none;'>
			<div class='rating-wrap' style='padding: 5px;'>
				<input  style ='background-color: rgba(169, 169, 169, 0.447); width: 500px; height: 200px;color:greenyellow;font-size:large' type='text' name='review'  placeholder='Write your valuable feedback'>
				<h4 style='color: crimson;'>RATE HERE</h4>
				<div class='center'>
					<fieldset class='rating'>
					<input type='radio' id='star5' name='rating' value='5'/><label for='star5' class='full' title='Awesome'></label>
					<input type='radio' id='star4.5' name='rating' value='4.5'/><label for='star4.5' class='half'></label>
					<input type='radio' id='star4' name='rating' value='4'/><label for='star4' class='full'></label>
					<input type='radio' id='star3.5' name='rating' value='3.5'/><label for='star3.5' class='half'></label>
					<input type='radio' id='star3' name='rating' value='3'/><label for='star3' class='full'></label>
					<input type='radio' id='star2.5' name='rating' value='2.5'/><label for='star2.5' class='half'></label>
					<input type='radio' id='star2' name='rating' value='2'/><label for='star2' class='full'></label>
					<input type='radio' id='star1.5' name='rating' value='1.5'/><label for='star1.5' class='half'></label>
					<input type='radio' id='star1' name='rating' value='1'/><label for='star1' class='full'></label>
					<input type='radio' id='star0.5' name='rating' value='0.5'/><label for='star0.5' class='half'></label>
					</fieldset>
				</div>
				<h4 id='rating-value' style='width: fit-content;color:blue' style='padding: 5px;'></h4>
	        </div>
		</div>
		<div style='margin-left:40%;'> <button class='btn'> submit review</button> </div>
	</form>
		  ";	
	  
	  


		   echo " 

		<div class='product' style='width:fit-content;marigin-left:20%'>
		   <img src='$imgpath'>
		   <div class='product-info'>
		           <h5 style='color: brown;'> ORDER DETAILS </h5>
				   <p style='font-size:medium; text-align: left;'> ORDER-ID: $orderid</P>
				   <p style='font-size:medium;text-align: left;'> PRODUCT-NAME : $name </P>
				   <p style='font-size:medium;text-align: left;'> PRODUCT-ID : $proid</P>
				   <p style='font-size:medium;text-align: left;'> ORDER-COST: ₹$price</p>
				   <p style='font-size:medium;text-align: left;'> ORDERED-TIME:$ordered_date</p>
		   </div>
		   <p  style='color:rgb(146, 13, 139);font-size: medium;text-align: left;'>  <span  style='color:rgb(6, 55, 58);font-size: medium;'> DELIVERED-TIME </span> :$delivered_date </p>
		   <p  style='color:rgb(146, 13, 139);font-size: medium;text-align: left;'>  <span  style='color:rgb(6, 55, 58);font-size: medium;'> DELIVERED ADDRESS </span> :$adr_client </p>
		   <p style='color:rgb(146, 13, 139);font-size: medium;text-align: left;' >  <span style='color:rgb(6, 55, 58);font-size: medium;'> CONTACT</span>: $phn_client</p>
   
	   </div>";
	   }

 echo "
 </div>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" href="style_rating.css">
	<style>
		::placeholder {
  color: white;
  opacity: 0.5;
  font-size: large; 
}
	</style>
</head>
<body>
	<script src="star-ratings.js"></script>
</body>
</html>