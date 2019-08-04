<?php
$message = "Click <a href=\"install.php?install=yes\">here</a> to install users_data.";
$db = 0;
if(isset($_REQUEST["install"]) && $_REQUEST["install"] == "yes")
{
    include("config.inc.php");
    // Connects to the server
    $link = new mysqli($server, $username, $password);
    // Checks the connection
    if($link->connect_error)
    {
        die("Connection failed: " . $link->connect_error);
    }
    // Checks if the database 'voterid' already exists
    if(!mysqli_select_db($link,"voterid"))
    {
        // Creates the database 'voterid'
        $sql = "CREATE DATABASE IF NOT EXISTS voterid";
        $recordset = $link->query($sql);
        if(!$recordset)
        {
            die("Error: " . $link->error);
        }
        // Selects the database 'voterid'
         mysqli_select_db($link,"voterid");
        $sql = "CREATE TABLE IF NOT EXISTS voterlist (VoterID varchar(100) DEFAULT NULL,VoterName varchar(100) DEFAULT NULL, Password varchar(100)DEFAULT NULL,choice varchar(100) DEFAULT NULL)";
        $recordset = $link->query($sql);
        if(!$recordset)
        {
                die("Error: " . $link->error);
        }

        // Populates the table 'heroes' with the default users
        $sql = "INSERT INTO voterlist (VoterID, VoterName,Password,choice) VALUES ('101','Voter1','Voter1',''),";
       // $sql.= "";
        $sql.= "('102','Voter2','Voter2',''),";
        $sql.= "('103','Voter3','Voter3',''),";
        $sql.= "('104','Voter4','Voter4',''),";
        $sql.= "('105','Voter5','Voter5','')";

        $recordset = $link->query($sql);
        if(!$recordset)
        {
                die("Error: " . $link->error);
        }
    }

 if(!mysqli_select_db($link,"blog_examples"))
    {
        // Creates the database 'blog_examples'
        $sql = "CREATE DATABASE IF NOT EXISTS blog_examples";
        $recordset = $link->query($sql);
        if(!$recordset)
        {
            die("Error: " . $link->error);
        }
        // Selects the database 'blog_examples'
         mysqli_select_db($link,"blog_examples");

        $sql = "CREATE TABLE IF NOT EXISTS users (`id` int(11) NOT NULL AUTO_INCREMENT,`user_name` varchar(55) NOT NULL,`password` varchar(12) NOT NULL,`display_name` varchar(55) NOT NULL,PRIMARY KEY (`id`))";
        $sql.= "ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3";
        $recordset = $link->query($sql);
        if(!$recordset)
        {
                die("Error: " . $link->error);
        }
        // Populates the table 'users' with the default users
        $sql = "INSERT INTO users (id, user_name,password,display_name) VALUES (1, 'admin', 'admin', 'Admin'),";
        $sql.= "(2, 'aashish', '12345', 'aashish')";
        $recordset = $link->query($sql);
        if(!$recordset)
        {
                die("Error: " . $link->error);
        }

        $sql = "CREATE TABLE IF NOT EXISTS failed_login (`ip_address` varchar(255) NOT NULL,`date` datetime NOT NULL)";

        $recordset = $link->query($sql);

        if(!$recordset)
        {
                die("Error: " . $link->error);
        }

        // Populates the table 'failed_login'
        $sql = "INSERT INTO failed_login (ip_address,date) VALUES ('',''),";
        $sql.= "('','')";
        $recordset = $link->query($sql);
        if(!$recordset)
        {
                die("Error: " . $link->error);
        }
    }

    // Checks if the database 'users_data' already exists
    if(!mysqli_select_db($link,"users_data"))
    {
        // Creates the database 'users_data'
        $sql = "CREATE DATABASE IF NOT EXISTS users_data";
        $recordset = $link->query($sql);
        if(!$recordset)
        {
            die("Error: " . $link->error);
        }
        // Selects the database 'users_data'
         mysqli_select_db($link,"users_data");

        $sql = "CREATE TABLE IF NOT EXISTS admin (name varchar(100) DEFAULT NULL,password varchar(100) DEFAULT NULL)";
        #$sql.= "PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

        $recordset = $link->query($sql);

        if(!$recordset)
        {
                die("Error: " . $link->error);
        }
        // Populates the table 'admin' with the default users
        $sql = "INSERT INTO admin (name, password) VALUES ('admin', 'admin'),";
        $sql.= "('aashish', '12345'),";
        $sql.="('rayyan','12345')";

        $recordset = $link->query($sql);
        if(!$recordset)
        {
                die("Error: " . $link->error);
        }
    }
    $db = 1;
    $link->close();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <script src="js/html5.js"></script>
    <title>Installation</title>
  </head>
  <body>
  <div id="menu">
      <table>
          <tr>
          <?php
          if($db == 1)
          {
          ?>
             <?php
          }
          else
          {
          ?>
          <?php
          }
          ?>
          </tr>
      </table>
  </div>
  <div id="main">
      <h1>Installation</h1>
      <p><?php echo $message?></p>
  </div>
  </body>
</html>
