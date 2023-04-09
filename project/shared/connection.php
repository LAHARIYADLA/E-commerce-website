<?php
 $conn= new mysqli("localhost","root","","acme23");
 if($conn->connect_error){
    echo " connection error";
    die;
 }
// here above code is going to be repeated every time
// if something is going to be repeated you should not repeat with it
// dont repeat urself 
//a developer goal is that
?>