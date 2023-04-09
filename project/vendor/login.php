<?php

session_start();
$_SESSION['login_status']=false;
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$hash=md5($upass);
 include"../shared/connection.php";

 //$sql_cursor= mysqli_query($conn,"select *  from vendor where username='$uname' and password='$upass' ");
 // insted of comparing the password we have to compare the hash
 $sql_cursor= mysqli_query($conn,"select *  from vendor where username='$uname' and password='$hash' ");

 if(mysqli_num_rows($sql_cursor)==0){
    echo " <h1> invalid credentials </h1>";
    die;
 }

 echo " <h1> LOGIN SUCCESS </h1";
 // so when login is success we need to store all these details in session right
 //from sql cursor  I am going to fecth one associative row
// inside session i am going to store user data that we fecthed from sql cursor 
// also storing login status as true 
// i can  store even loged in username
 $row=mysqli_fetch_assoc($sql_cursor);

 $_SESSION['userdata']=$row;
 $_SESSION['login_status']=true;
 $_SESSION['username']=$row['username'];
 header("location:upload.php");

//NEXT PAGE VALIDATION 
// so now it should be redirected to some php side that needs to verify 
//that sees is there login status or not
//if no login status variable is not  there then it should be not opened by some people with url who hasnt registered
//if login status , we recieved from previous page  but its false then also it shouldn't be opened 

//that is by starting the default session login status should be false and it should be modified as true only when credentials entered are  true in previous page(current page)
?>
