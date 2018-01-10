<?
mysql_connect("localhost", "root", "apmsetup") or die (mysql_error()); 
 mysql_select_db("choigoon7"); 
 
 mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");

$userid = $_GET['userid'];

$no    = $_GET['no'];

$query = "SELECT FILENAME,FILE " .
         "FROM document WHERE NO = '$no'";

$result = mysql_query($query) or die('Error, query failed');
list($filename, $filecontent) =  mysql_fetch_array($result);

header("Content-Disposition: attachment; filename=$filename");
echo $filecontent;


exit;


?>

