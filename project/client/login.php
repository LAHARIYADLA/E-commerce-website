<?php

session_start();
$_SESSION['login_status']=false;
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$hash=md5($upass);
 include"../shared/connection.php";
 $sql_cursor= mysqli_query($conn,"select *  from client where username='$uname' and password='$hash' ");

 if(mysqli_num_rows($sql_cursor)==0){
    echo " <h1> invalid credentials </h1>";
    die;
 }

 echo " <h1> LOGIN SUCCESS </h1";
 $row=mysqli_fetch_assoc($sql_cursor);

 $_SESSION['userdata']=$row;
 $_SESSION['login_status']=true;
 $_SESSION['username']=$row['username'];
 header("location:view.php");
?>
