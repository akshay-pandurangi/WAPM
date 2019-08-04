<?php
session_start();
if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	echo "<center><h1>Welcome $user</h1></center>";
	include("config.inc.php");
 	$conn = mysqli_connect($server, $username, $password);
 	$db = mysqli_select_db($conn, "voterid");
 	$id = mysqli_query($conn, "SELECT VoterId FROM voterlist WHERE VoterName='$user'");
 	$titles = array();
	while($row = mysqli_fetch_array($id))
	{
	    $titles[] = $row['VoterId'];
	}
	$id = implode(",", $titles);

	
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>IDOR-unpatched</title>
	</head>
	<body>
		<br>
		<br>
		<center><h1> Elections 2019</h1></center>
		<form method="post" action="vote.php">
			<center>
		<br>
		<br>
		<br>
		<br>

				<select name="Party" >
					<option>   </option>
					<option value="BJP"> BJP </option>
					<option value="Congress"> Congress </option>
					<option value="Shiv Sena"> Shiv Sena </option>
					<option value="RSS"> RSS </option>
					<option value="AAP"> AAP </option>
					<option value="TMC"> TMC </option>
				</select>
				<input type="submit" name="submit">
				<?php
				echo '<input type="hidden" name="ID" value="'.$id.'" >';
				?>
	</form>		
	</body>
	</html>
	<?php
	$user = $_SESSION['user'];
	$pass = $_SESSION['pass'];

	if(isset($_POST['submit']))
	{
		include("config.inc.php");
 		$conn = mysqli_connect($server, $username, $password);
 		$choice = $_POST['Party'];
 		$id = $_POST['ID'];

 		$db = mysqli_select_db($conn, "voterid");
 		$id = mysqli_query($conn, "SELECT VoterId FROM voterlist WHERE VoterName='$user'");
 		while($row = mysqli_fetch_array($id))
		{
			$titles[] = $row['VoterId'];
	    
		}
		$mysql = "UPDATE voterlist SET choice = '$choice' WHERE VoterId='$titles[0]'";
 		

		if(mysqli_query($conn,$mysql))
		{
			echo "<h4> You have chosen $choice </h4>";

		while($row = mysqli_fetch_array($id))
			{


	    	$titles[] = $row['VoterId'];
			}

			$id = implode(",", $titles);
			}
				else
				{
						echo mysqli_error($conn);
				}
			}


	}
	else
	{
		echo"<script>location.href='adminlogin.php'</script>";
	}
?>
