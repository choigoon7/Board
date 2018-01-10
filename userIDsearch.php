<?
mysql_connect("localhost", "root", "apmsetup") or die (mysql_error()); 
 mysql_select_db("choigoon7"); 
mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>최연상의 페이지</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.css" />    
    
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.js"></script>

</head>

<body>
<? 
$tablename="userinfo";
$query="select * from $tablename"; 
$result=mysql_query($query) or die (mysql_error()); 


while ($array=mysql_fetch_array($result)) 
{
  if($array[ID] == $_POST["userid"])
  {
	if($array[PWD] == $_POST["password"])
	{
		if($array[ID] == "admin")
		{
			echo("<script>location.href='noticeboard.php?name=$array[NAME]';</script>"); 
			goto a;
		}
		
		if($array[SUPERUSER_NUM] == 0)
		{
			echo("<script>location.href='userboard.php?userid=$array[ID]';</script>"); 
			goto a;
		}
		
		if($array[SUPERUSER_NUM] == 1)
		{
			echo("<script>location.href='superuserboard.php?superuserid=$array[ID]'</script>"); 
			goto a;
		}
		
	}
	
	else
	{
		$message = "비밀번호를 잘못 입력하셨습니다";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo("<script>location.href='index.html';</script>"); 
		goto a;

	}

  }  
 	
}
		$message = "아이디가 존재하지 않습니다.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo("<script>location.href='index.html';</script>");
		
		a: 
?>
</body>
</html>
