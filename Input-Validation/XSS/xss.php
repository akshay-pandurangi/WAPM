<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="js/html5.js"></script>
<title>XSS - Vulnerable</title>
</head>
<body>
<div id="main">
    <h1>Android Games</h1>
    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="GET">
        <p><label for="query">Search</label><br />
        <input type="text" id="query" name="q"></p>
        <button type="submit" name="form" value="submit">Go</button>
    </form>
    <br />
    <?php
    if(isset($_GET["q"]))
    {
        $query = $_GET["q"];
        echo "The result for : <i>" . $query. "</i><br>" ;
        if($query == "pubg")
        {
            echo '<a href= "https://www.apkmirror.com/apk/tencent-games/pubgmobile/pubgmobile-0-12-release/pubg-mobile-0-12-0-android-apk-download/"> PUBG 0.12.0 </a><br>';
            echo '<a href= "https://www.apkmirror.com/apk/tencent-games/pubgmobile/pubgmobile-0-11-0-release/pubg-mobile-0-11-0-android-apk-download/"> PUBG 0.11.0 </a><br>';
        }
        elseif($query == "garena")
        {
            echo "https://www.apkmirror.com/apk/garena-international-i-private-limited/garena-free-fire/garena-free-fire-1-33-0-release/garena-free-fire-1-33-0-android-apk-download/";
        }
        elseif($query == "coin master")
        {
            echo "https://www.apkmirror.com/apk/moon-active/coin-master/coin-master-3-5-14-release/coin-master-3-5-14-android-apk-download/";
        }
        elseif($query == "marvel")
        {
          echo '<a href = "https://www.apkmirror.com/apk/netmarble-corporation/marvel-future-fight/marvel-future-fight-5-0-1-release/"> Marvel Future Fight 5.0.1 </a><br>';
          echo '<a href = "https://www.apkmirror.com/apk/netmarble-corporation/marvel-future-fight/marvel-future-fight-5-0-0-release/"> Marvel Future Fight 5.0.0 </a><br>';
          echo '<a href = "https://www.apkmirror.com/apk/netmarble-corporation/marvel-future-fight/marvel-future-fight-4-9-0-release/"> Marvel Future Fight 4.9.0</a><br>';
        }
        elseif($query == "clash of clans")
        {
            echo "<a href = 'https://www.apkmirror.com/apk/supercell/clash-of-clans/clash-of-clans-11-446-24-release/'> Clash Of Clans 11.446.24 </a><br>";
            echo "<a href = 'https://www.apkmirror.com/apk/supercell/clash-of-clans/clash-of-clans-11-446-22-release/'> Clash Of Clans 11.446.22 </a><br>";
            echo "<a href = 'https://www.apkmirror.com/apk/supercell/clash-of-clans/clash-of-clans-11-446-20-release/'> Clash Of Clans 11.446.20 </a><br>";
        }
        elseif($query == "candy crush")
        {
            echo "https://www.apkmirror.com/apk/king/candy-crush-saga/candy-crush-saga-1-151-0-1-release/";
        }
        elseif($query == "8 ball pool")
        {
            echo "https://www.apkmirror.com/apk/miniclip-com/8-ball-pool/8-ball-pool-4-4-0-release/";
        }
        elseif($query == "")
        {
          echo "The app is not available";
        }
        else {
          echo "The app is not available";
        }
    }

    ?>

    <a href="xssviewpage.php"><button>View Code</button></a>
</div>
</body>
</html>
