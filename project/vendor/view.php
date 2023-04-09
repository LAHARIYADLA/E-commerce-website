<!DOCTYPE html>
    <html lang="en">
    <head>
    <!-- styling for  search form -->
   <style> 
    .ip1,.ip2{
        text-align: center;
        width: 50%;
        height:50px;
        border-radius: 5px;
        margin: 3px;
        background-color: rgba(29, 126, 58, 0.418);
        color: white;
    }
    .ip2{
        border: 2px solid crimson;
    }
    .ip1{
        border: 0 0 0 2px;
        border-bottom: solid crimson;
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

<!-- this page also required validation as upload.php
to check wheather the page opened is only after correct login -->
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
    include "../shared/connection.php";
    $userid=$_SESSION['userdata']['userid'];
    $uname=$_SESSION['userdata']['username'];
    if(isset($_POST['search']))
    {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM product WHERE userid=$userid AND product.name LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
    }
    else {
    $query = "SELECT * FROM product WHERE userid=$userid ";
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
    echo "
            <div style='width:50%;height:10%;' class='fil'>
            <form action='view.php' method='post'>
            <input type='text' class='ip1' name='valueToSearch' placeholder=' Value To Search'><br>
            <input type='submit'  class='ip2' name='search' value='🔍  search'>
            </form>
        </div>
        <div class='flex '> ";
   //$sql_cursor=mysqli_query($conn,"select * from product where userid=$userid");
       // while($row=mysqli_fetch_assoc($sql_cursor))
       while($row = mysqli_fetch_array($search_result))
        {   $proid=$row['proid'];// this used later while editing and deleting as reference
            $name=$row['name'];
            $price=$row['price'];
            $details=$row['details'];
            $imgpath=$row['imgpath'];
            echo " 
             
       
    <div class='card'>
        <div class='price-wrapper d-flex justify-content-between '>
                                <div class='name '>$name</div>
                                <div class='price text-danger'>  ₹$price</div>
        </div>
            <div class='img-wrapper text-center'><img src='$imgpath' class='img-file'></div>
            <div class='details'>$details</div>
            <div class='d-flex justify-content-around'>
                    <div> <a href='editproduct.php?proid=$proid'> <button class='btn btn-warning '> <i class='bi-pencil'></i></button></a></div>
                    <div><a href='deleteproduct.php?proid=$proid'><button class='btn btn-danger '> <i class='bi-trash'></i></button></a></div>
            </div>
                        
 </div>";
        }
  echo "</div>";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body
        {
            background-image: url(bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .flex
        {
            display:flex;
            flex-wrap:wrap;
        }
        .card
        { overflow: hidden;
            width: 400px; 
            max-height: 500px;     
            margin:20px;
            border:2px solid grey;
            padding:10px;
        }
        .img-wrapper
        {
            max-width: 300px;
            
        }
        .img-file
        {
            margin:auto;
            max-width:200px;
            max-height:250px;
        }
        .name
        {
            font-size:24px;
        }
        .price
        {
            font-size:26px;
        }
        .price-wrapper
        {
            border-bottom:2px solid grey;
            margin-bottom:5px;
        }
    </style></head><body></body></html>