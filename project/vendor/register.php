 <!-- 
upto now its fine but 
the admin is here able to see passowrds of users in the database 
find is there any way to avoid that 

for that we have to do password hashing
using bcrypt this is certain library  to do hashing
i.e for the particular user password the encryted password will be generated
and that encrypted password only will be visible to admin 
 so in order to decrypt the password the  only key should be the user password that is konwn only by user 
  
 in php  there are two types of password hashing 
 1.md5()
 
-->

 <?php

 $uname=$_POST['uname'];
 $upass=$_POST['upass1'];
 $hash=md5($upass);
  include"../shared/connection.php";
 /*
       //php way for validation username
  $sql_cursor=mysqli_query($conn,"select * from vendor where username ='$uname'");
       //to get the number of rows there was a function mysqli_num_rows
  $count=mysqli_num_rows($sql_cursor);
  if($count >0){
    echo "username is not available, try different one";
    die;
  }
  */
  $status=mysqli_query($conn,"insert into vendor(username,password) values('$uname','$hash')");
  // as you included the file connection.php
  // u can use the variables of that file in here also
  if($status){
    echo "registration success";
    header("location:login.html");
  }
  else{
    echo "error in sql";
    echo mysqli_error($conn);
  }
// the problem now is we register same user name many times 
// here we need to validate
// there two ways to do it 
// one is php way (its somewhat complex)
// other is sql way

// php way is 
// before performing the insert operation we need to perform read operation 
//sql way is setting the particular column as unique
// when we enter same username then it will throw an error i.e coonection error
// so this sql way is best option to use 


/* why the userid is required why can we make unique username as primary and use that....
ans:
    if the username is email then  after sometime user wants 
    to change the email there may be edit option
    since userid is auto incremented no admin will allow edit option to it
    userid is the true parameter 
*/
?>