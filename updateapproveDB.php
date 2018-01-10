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
 $sc =$_GET['sc']-1;
 $sunum =$_GET['sunum'];
 
 $number=$_GET['dnum']; 
 $superuserid = $_GET['superuserid']; 
  
  $app=" "; 

  
 if($sunum ==1)
 {
	 $sql = " UPDATE document SET SUPERUSERCOUNT='$sc' , SUPERUSER1_CHECKED = '$superuserid' WHERE NO = '$number' ";
	 mysql_query($sql) or die (mysql_error());
 }
 elseif($sunum ==2)
 {
	  $sql = " UPDATE document SET SUPERUSERCOUNT='$sc' ,SUPERUSER2_CHECKED = '$superuserid' WHERE NO = '$number' ";
	  mysql_query($sql) or die (mysql_error());
 }
 elseif($sunum ==3)
 {
	  $sql = " UPDATE document SET SUPERUSERCOUNT='$sc' ,SUPERUSER3_CHECKED = '$superuserid' WHERE NO = '$number' ";
	  mysql_query($sql) or die (mysql_error());
 }
  
 

  
echo("<script>location.href='superuserapproveprogress.php?superuserid=$superuserid';</script>"); 


  
  ?>
</body>
</html>




 

