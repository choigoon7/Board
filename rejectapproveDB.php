<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?
  

mysql_connect("localhost", "root", "apmsetup") or die (mysql_error());  mysql_select_db("choigoon7"); 
 
 mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
  
 $number=$_GET['dnum']; 
 $superuserid = $_GET['superuserid']; 
  
    

	  $sql = " UPDATE document SET APPROVE_CKECKED=100 WHERE NO = '$number' ";
	  mysql_query($sql) or die (mysql_error());

  
 

  
echo("<script>location.href='superuserapproveprogress.php?superuserid=$superuserid';</script>"); 


  
  ?>
</body>
</html>




 

