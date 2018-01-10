
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?
  //include "library.php";

mysql_connect("localhost", "root", "apmsetup") or die (mysql_error());  mysql_select_db("choigoon7"); 
 
 mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
  $userid = $_GET['userid'];


 $title = $_POST["title"];
 
// $writer= $_POST["writer"];
 $content= $_POST["content"];
 
 $fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];

$fp      = fopen($tmpName, 'r');
$filecontent = fread($fp, filesize($tmpName));
$filecontent = addslashes($filecontent);
fclose($fp);
  
    
 $superuser1 = $_POST["approval1"];
 $superuser2 = $_POST["approval2"];
 $superuser3 = $_POST["approval3"];
 
 if($superuser1 != null)
 {
	 $superusercount = 1;
	 if($superuser2 != null)
 	{
	 	$superusercount = 2;
	 	
		if($superuser3 != null)
 		{
	 		$superusercount = 3;
	 
 		}
 
 	}
	else
	{
		if($superuser3 != null)
 		{
	 		$superusercount = 2;
	 
 		}
	}
 
 }
 else
 {
	if($superuser2 != null)
 	{
	 	$superusercount = 1;
	 	
		if($superuser3 != null)
 		{
	 		$superusercount = 2;
	 
 		}
 
 	}
	else
	{
		if($superuser3 != null)
 		{
	 		$superusercount = 1;
	 
 		}
		else
		{
			$superusercount = 0;
		}
	}
 }
 
 
 $date= date("Y-m-d H:i:s");
  
 $approve_checked=0; 
 
 $sql = "insert into document
         values('','$title','$content',' $userid',' $fileName','$filecontent ','$superusercount','$superuser1','$superuser2','$superuser3','','','','$date','$approve_checked')";
  
 mysql_query($sql) or die (mysql_error());
  
 
echo("<script>location.href='approveprogress.php?userid=$userid';</script>"); 


  
  ?>
</body>
</html>




 

