<?php
session_start();

$host="127.0.0.1";  
$username="root";  
$password=""; 
$db_name="users_data";
$tbl_name="admin";


$connect=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
$db=mysqli_select_db($connect,"$db_name")or die("cannot select DB");

$myusername=($_POST['user']); 
$mypassword=($_POST['pass']); 

$result=mysqli_query($connect,"SELECT * FROM $tbl_name WHERE user='$myusername' and pass='$mypassword'")or die('Error:' .mysqli_error($connect));
$count=mysqli_num_rows($result);
if($count==0)
{
echo "Wrong Username or Password";
}
else 
{
$_session['myusername']=$user;
$_session['mypassword']=$pass; 
header("Location:login_success.php");
}
?>

