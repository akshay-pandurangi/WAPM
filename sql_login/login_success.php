<?php
session_start();
if( isset($_SESSION['myusername']) )
{
header("location:vuln_index.php");
}
?>
<html>
<body>
<?php
echo "<center>";
echo "Successfully login";
echo "</center>";
echo '<a href="vuln_logout.php"><h2 align = "center">Logout</h2></a>';
?>
</body>
</html>