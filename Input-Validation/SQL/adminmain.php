<html>
<head>
	<link rel="stylesheet" href="Des.css">

	<title>Admin Main Page</title>
	</head>

	<center><br><br>
<?php
session_start();
if(isset($_SESSION['user'])){
	
echo "Welcome to Main Page";
	}
else {
	echo"<script>location.href='adminlogin.php'</script>";
}
?>


</center>
	<body bgcolor="cyan">
		<?php
		echo '<a href="logout.php"><h2 align = "center">Logout</h2></a>';
		?>
	</body>
</html>
