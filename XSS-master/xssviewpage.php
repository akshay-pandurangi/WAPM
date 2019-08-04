<?php //show_source("xss_patch.php")
//echo filter_var(show_source("xss_patch.php"))
echo '<?php<br>';
echo 'if(isset($_GET["q"]))<br>';
echo '{<br>';
echo '    $query = $_GET["q"];<br>';
echo 'The result for : &lt;i&gt; . $query. &lt;i&gt; ;<br>';
echo '}<br>';
echo '<?>';

?>
