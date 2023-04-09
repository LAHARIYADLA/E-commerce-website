<?php
include "menu.html";
include_once "../shared/connection.php";
session_start();
$userid=$_SESSION['userdata']['userid'];
$uname=$_SESSION['userdata']['username'];
$query="select * from product join ratings on product.proid=ratings.proid where product.userid=$userid";
$sql_cursor=mysqli_query($conn,$query);
echo "
<table class='content-table'>
        <thead>
          <tr>
            <th>Clientid</th>
            <th>Orderid</th>
            <th>Name-Id</th>
            <th>Price</th>
            <th>Image</th>
            <th>Review</th>
            <th>Rating</th>
         </tr>
        </thead>
        <tbody>";
while($row=mysqli_fetch_assoc($sql_cursor))
{   $clientid=$row['clientid'];
    $orderid=$row['orderid'];
    $proid=$row['proid'];
    $name=$row['name'];
    $price=$row['price'];
    $imgpath=$row['imgpath'];
    $review=$row['review'];
    $rating=$row['rating'];
    echo "
    <tr>
        <td>$clientid</td>
        <td>$orderid</td>
        <td>$name($proid)</td>
        <td><span style='color:red;'> ₹</span>$price</td>
        <td><img src='$imgpath' alt='pro img' width='50px' height='50px'> </td>
        <td>$review</td>
        <td>$rating</td>
  </tr>";
}
echo "  </tbody>
</table>
";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

                * {
                    /* Change your font family */
                    font-family: sans-serif;
                }

                .content-table {
                    text-align: center;
                    align-items: center;
                    border-collapse: collapse;
                    margin: 25px 0;
                    font-size: 0.9em;
                    min-width: 400px;
                    border-radius: 5px 5px 0 0;
                    overflow: hidden;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                }

                .content-table thead tr {
                    background-color: darkmagenta;
                    color: #ffffff;
                    text-align: center;
                    font-weight: bold;
                }

                .content-table th,
                .content-table td {
                    padding: 12px 15px;
                }

                .content-table tbody tr {
                    border-bottom: 1px solid #dddddd;
                }

                .content-table tbody tr:nth-of-type(even) {
                    background-color: #f3f3f3;
                }

                .content-table tbody tr:last-of-type {
                    border-bottom: 2px solid darkmagenta;
                }

</style>
</head>
<body>
    
         
       
</body>
</html>