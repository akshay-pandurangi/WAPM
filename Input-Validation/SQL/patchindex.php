<html>
<title>SQLi - Patched</title>
<body bgcolor="cyan">
<p align="right"><a href="patchviewsource.php"><button>View Code</button></a></p>
<center>
<h1>Admin Dashboard</h1>
</center>
</body>
</html>
<?php
session_start();
$error='';
if(isset($_POST['submit'])){
 if(empty($_POST['user']) || empty($_POST['pass'])){
 $error = "Username or Password is Invalid";
 }
 else
 {
	 include("config.inc.php");
$conn = mysqli_connect($server, $username, $password);
$db = mysqli_select_db($conn, "users_data");

$user=mysqli_real_escape_string($conn, $_POST['user']);
$pass=mysqli_real_escape_string($conn, $_POST['pass']);
 
$query = mysqli_query($conn, "SELECT * FROM admin WHERE name='$user' AND password='$pass'")or die('Error:' .mysqli_error($connect));
$rows = mysqli_num_rows($query);
if($rows == 1){
$_SESSION['user'] = $user;
 header("Location: adminmain.php");
 }
 else
 {
 $error = "Username of Password is Invalid";
 }
 mysqli_close($conn);
 }
}
echo '<html>';
echo '<head>';
echo '<title>Login</title>';
echo '<link rel="stylesheet" href="Des.css">';
echo '<style>';
echo '.login{';
echo 'width:360px;';
echo 'margin:50px auto;';
echo 'font-family:arial; ';
echo 'color: black;';
echo 'border-radius:10px;';
echo 'border:2px solid #168DA0;';
echo 'padding:12px 40px 25px;';
echo 'margin-top:70px; ';
echo '}';
echo 'input[type=text], ';
echo 'input[type=password]{';
echo 'width:99%;';
echo 'padding:12px;';
echo 'margin-top:8px;';
echo 'border:1px solid #168DA0;';
echo 'padding-left:5px;';
echo 'font-size:16px;';
echo 'font-family:arial; ';
echo '}';
echo 'input[type=submit]{';
echo 'width:100%;';
echo 'background-color:black;';
echo 'color:#fff;';
echo 'padding:12px;';
echo 'font-size:20px;';
echo 'cursor:pointer;';
echo 'border-radius:5px;';
echo 'margin-bottom:15px; ';
echo '}';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<div class="login">';
echo '<h1 align="center">Login</h1>';
echo '<form action="" method="post" style="text-align:center;">';
echo '<input placeholder="Username" type="text"  name="user"><br/><br/>';
echo '<input placeholder="Password" type="password"  name="pass"><br/><br/>';
echo '<input type="submit" value="Login" name="submit">';
echo '<span>';
echo $error;
echo '</span>';
echo '</body>';
echo '</html>';
?>
