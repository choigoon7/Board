<?php

@extract($_GET);

@extract($_POST);

@extract($_SERVER);

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?
  

mysql_connect("localhost", "root", "apmsetup") or die (mysql_error()); 
 mysql_select_db("choigoon7"); 
 
 mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
   
$name = $_GET['name'];   
$c=$_POST["deleteid"];


$sql = "DELETE FROM userinfo WHERE ID = '$c' ";

     
 mysql_query($sql) or die (mysql_error());
  
echo("<script>location.href='adminboard.php?name=$name';</script>"); 
 


  
  ?>
</body>
</html>




 

