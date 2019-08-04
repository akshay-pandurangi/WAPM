<?php
session_start();
$error='';
if(isset($_POST['submit'])){
  if(empty($_POST['uname']) || empty($_POST['password'])){
   $error = "Username or Password is Invalid";
  }
 else
 {
    include("config.inc.php");
    $conn = mysqli_connect($server, $username, $password);
    $user=mysqli_real_escape_string($conn, $_POST['uname']);
    $pass=mysqli_real_escape_string($conn, $_POST['password']);
    $db = mysqli_select_db($conn, "voterid");
    $query = mysqli_query($conn, "SELECT * FROM voterlist WHERE votername='$user' AND password='$pass'");
    $rows = mysqli_num_rows($query);
    if($rows == 1){
      $_SESSION['user'] = $user;
      $_SESSION['pass'] = $pass;
       header("Location: vote.php");
       }
    else
    {
      $error = "Username of Password is Invalid";
    }
 mysqli_close($conn);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>IDOR-Unpatched</title>
</head>
<body>
	<h1>Login Form</h1>
	<form method="post" action="index.php">
		<h3>Username</h3><br>
	<input type="text" name="uname"><br>
		<h3>Password</h3><br>
	<input type="password" name="password">	<br>
	<input type="submit" name="submit">
	</form>
</body>
</html>
