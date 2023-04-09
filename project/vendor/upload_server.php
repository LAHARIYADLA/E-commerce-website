<!-- 
    when you are uploading a file you cannot upload it  normally you have to make some modifications
    how to upload a file to server using form of html?
    To upload a file to a server using an HTML form, you can use the <form> element with the enctype attribute set to "multipart/form-data". This will allow you to send binary data, such as files, in the request.

Here's an example form that allows users to upload a file:
<form action="/upload" method="post" enctype="multipartform-data">
        <label for="file">Select a file:</label>
        <input type="file" id="file" name="file">
        <br>
        <input type="submit" value="Upload">
</form>
The enctype attribute is set to "multipart/form-data" to indicate that binary data will be included in the request.
 so the data is not going to reach server as one data will be divided into chunks and travel through different paths

 the data we recieve with this we should treat it differently
 the uploaded image will uploaded to server location but it will be in temporary location
 we need to move it another location with function called move _uploaded_file(temp_path,"new_path");
 files array contain a object array of objects 
1.// print_r($_FILES); O/p is
    Array ( [product_image] => Array ( [name] => bottle.jpg [full_path] => bottle.jpg [type] => image/jpeg 
    [tmp_name] => C:\Users\lahar\Desktop\webD\xamp\tmp\php29BE.tmp [error] => 0 [size] => 8401 ) ) 
2.// print_r($_FILES['product_image']);
    Array ( [name] => bottle.jpg [full_path] => bottle.jpg [type] => image/jpeg 
    [tmp_name] => C:\Users\lahar\Desktop\webD\xamp\tmp\phpCC3B.tmp [error] => 0 [size] => 8401 )
3.//print_r($_FILES['product_image']['tmp_name']);
     C:\Users\lahar\Desktop\webD\xamp\tmp\php2E19.tmp
-->
<?php
//print_r($_FILES['product_image']['tmp_name']);
//move_uploaded_file($_FILES['product_image']['tmp_name'],"bottleimg.jpg");
//where ever this page present inside that folder that file will saved with name bottleimg.jpg
//move_uploaded_file($_FILES['product_image']['tmp_name'],$_FILES['product_image']['tmp_name']);
// this above idea also a temporary solution but not permenant one bcz the file names may repeat
// so it should be unique id  like  uing some data time 
/* 
    $file_name=date("d-m-Y-H-i-s").$_FILES['product_image']['name'];
    move_uploaded_file($_FILES['product_image']['tmp_name'],$file_name);
*/
// again this is also not purely unique bcz there will be a case that  two users uplaoding with same name at the same time
// so mow the idea is to userid  lets print userdata what it contains
/* 
     session_start();
*/
/*print_r($_SESSION['userdata']);*/
//O/p: Array ( [userid] => 10 [username] => lahari [password] => 202cb962ac59075b964b07152d234b70 [created_date] => 2023-04-01 12:11:08 )
// print_r($_SESSION['userdata']['userid']);
// using this userid we need to concatinate the actual file name and date with . operator
/*
    $file_name=$_SESSION['userdata']['userid']."-".date("d-m-Y-H-i-s").$_FILES['product_image']['name'];
    move_uploaded_file($_FILES['product_image']['tmp_name'],$file_name);
*/
// again ,,all these presenting in this vendor folder isn't the correct one bcz client also be able to view the product image 
// this should be in shared folder so inside shared folder create images folder inside a file I am going to a prefix
session_start();
$prefix_path="../shared/images/";
$file_name=$prefix_path.$_SESSION['userdata']['userid']."-".date("d-m-Y-H-i-s")."-".$_FILES['product_image']['name'];
move_uploaded_file($_FILES['product_image']['tmp_name'],$file_name);
include "../shared/connection.php";
$name=$_POST['product_name'];
$price=$_POST['product_price'];
$details=$_POST['product_details'];
$userid=$_SESSION['userdata']['userid'];
$status= mysqli_query($conn,"insert into product(name,price,details,imgpath,userid) values ('$name','$price','$details','$file_name','$userid')");
if( !$status){
    echo "error in connection";
     echo mysqli_error($conn); 
    die;
}

    echo "product uploaded successfully";
    header("location:upload.php");


?> 