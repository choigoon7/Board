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
 $superuserid = $_GET['superuserid']; 
 
 $title = $_POST["title"];
 
 $writer= $_POST["writer"];
 $content= $_POST["content"];
 $date= date("l jS \of F Y h:i:s A");
  
 
 $sql = "insert into board
         values('','$title','$content',' $superuserid','$date')";
  
 mysql_query($sql) or die (mysql_error());
  
echo("<script>location.href='superuserboard.php?superuserid=$superuserid';</script>"); 


  
  ?>
</body>
</html>




 

