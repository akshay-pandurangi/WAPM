<?php //show_source("xss_patch.php")
//echo filter_var(show_source("xss_patch.php"))
echo '&lt;?php<br>';
echo 'if(isset($_GET["q"]))<br>';
echo '{<br>';
echo '    $query = $_GET["q"];<br>';
echo 'The result for : &lt;i&gt; . filter_var($query, FILTER_SANITIZE_FULL_SPECIAL_CHARS). &lt;i&gt; ;<br>';
echo '}<br>';
echo '?&gt;';

?>
