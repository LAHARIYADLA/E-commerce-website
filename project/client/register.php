 <?php

 $uname=$_POST['uname'];
 $upass=$_POST['upass1'];
 $phn=$_POST['phn'];
 $adr=$_POST['adr'];
 $hash=md5($upass);
  include"../shared/connection.php";
  $status=mysqli_query($conn,"insert into client(username,password,adr,phn) values('$uname','$hash','$adr','$phn')");
  if($status){
    echo "registration success";
    header("location:login.html");
  }
  else{
    echo "error in sql";
    echo mysqli_error($conn);
  }
?>