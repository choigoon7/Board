
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>최연상의 페이지</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.css" />    
    
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.js"></script>
<style>
div#hmenu { 
    margin: 0; 
    padding: .3em 0 .3em 0; 
    background: #ddeebb; 
    width: 100%; 
    text-align: center; 
 } 

 div#hmenu ul { 
    list-style: none; 
    margin: 0; 
    padding: 0; 
 } 

 div#hmenu ul li { 
    margin: 0; 
    padding: 0; 
    display: inline; 
 } 

 div#hmenu ul a:link{ 
    margin: 0; 
    padding: .3em .4em .3em .4em; 
    text-decoration: none; 
    font-weight: bold; 
    font-size: medium; 
    color: #004415; 
 } 

 div#hmenu ul a:visited{ 
    margin: 0; 
    padding: .3em .4em .3em .4em; 
    text-decoration: none; 
    font-weight: bold; 
    font-size: medium; 
    color: #227755; 
 } 

 div#hmenu ul a:active{ 
    margin: 0; 
    padding: .3em .4em .3em .4em; 
    text-decoration: none; 
    font-weight: bold; 
    font-size: medium; 
    color: #227755; 
 } 

 div#hmenu ul a:hover{ 
    margin: 0; 
    padding: .3em .4em .3em .4em; 
    text-decoration: none; 
    font-weight: bold; 
    font-size: medium; 
    color: #f6f0cc; 
    background-color: #227755; 
 } 
 
</style>

</head>

<body>	
<?


mysql_connect("localhost", "root", "apmsetup") or die (mysql_error());  mysql_select_db("choigoon7"); 

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");

$superuserid = $_GET['superuserid']; 
$tablename="document";

$query="select * from $tablename"; 
	$result=mysql_query($query) or die (mysql_error()); 

?>
	<!-- 메인 페이지-->
    <div data-role="page" id="main">
    	<div id ="head" data-role="header">     
			<h2 id="logo">결재자 페이지</h2>
        </div>         
        <div id ="content" data-role="content" data-theme="d" >
             
              <div id="hmenu"> 
 <ul> 
   <li><h4><?=$superuserid?> 님</h4></li> 
   <li> <a href="superuserboard.php?superuserid=<?=$superuserid?>"> 공지 사항  </a></li> 
   <li><a href="superusernoticeinsert.php?superuserid=<?=$superuserid?>">       공지 추가     </a></li> 
   <li><a href="superusernoticedelete.php?superuserid=<?=$superuserid?>">      공지 삭제 </a></li> 
   <br>
   <br>
   <li> <a href="superuserapproverequest.php?superuserid=<?=$superuserid?>"> 결재 올리기   </a>  </li>
   <li> <a href="superuserapproveprogress.php?superuserid= <?=$superuserid?> ">   진행 상황      	 </a> </li>
   <li> <a href="superuserrequestprogress.php?superuserid= <?=$superuserid?> ">  결재대기  	 </a> </li>
   
 </ul>   
 </div> 
             
            
            <div align="center" data-role="content" data-theme="d" > 
              <table border=1 cellspacing=0 width:100% bordercolordark=white bordercolorlight=#999999>
    <tr>
        <td  bgcolor=#CCCCCC>
            <p align=center>No</p>
        </td>
        <td  bgcolor=#CCCCCC >
            <p align=center>제  목</p>
        </td>
       
        <td  bgcolor=#CCCCCC>
            <p align=center>작성자</p>
        </td>
        <td  bgcolor=#CCCCCC>
            <p align=center>결재자</p>
        </td>
        <td  bgcolor=#CCCCCC>
            <p align=center>진행상황</p>
        </td>
        <td  bgcolor=#CCCCCC>
            <p align=center>날  짜</p>
        </td>
       
       
    </tr>     
   
   <?php
     
   
while ($array=mysql_fetch_array($result)) 
{    
	if($array[APPROVE_CKECKED] < $array[SUPERUSERCOUNT])
    {
    	$ch = "진행중";
    }
    else if($array[APPROVE_CKECKED] == $array[SUPERUSERCOUNT])
    {
    	$ch = "결재완료";
    }
    else
    {
   		 $ch = "거절";
    }
    
       
     $a = trim($array[SUPERUSER1]);
     $b = trim($array[SUPERUSER2]);
     $c = trim($array[SUPERUSER3]);
     
     $d = trim($superuserid);
     
     $a2 = trim($array[SUPERUSER1_CHECKED]);
     $b2 = trim($array[SUPERUSER2_CHECKED]);
     $c2 = trim($array[SUPERUSER3_CHECKED]);
     
     if(strcmp($a,$d) == 0 && $a2=="")
     {
     		echo ("
    <tr>
        <td  >
            <p align=center>$array[NO]</p>
        </td>
        
        <td   >
        <a href='superuserapproveuserview.php?number=$array[NO]&superuserid=$superuserid'> $array[TITLE]</a> 
           
        </td>
        
        <td  >
            <p align=center> $array[WRITER] </p>
        </td>
       
        <td  >
            <p align=center> $array[SUPERUSER1] $array[SUPERUSER2] $array[SUPERUSER3]</p>
        </td>
        <td  >
            <p align=center> $ch </p>
        </td>
        <td >
            <p align=center> $array[DATE] </p>
        </td>
        
    </tr> 
    ");	
     }
     elseif(strcmp($b,$d) == 0 && $b2=="")
     {	
     	if($a==$a2)
        {
        		echo ("
    <tr>
        <td  >
            <p align=center>$array[NO]</p>
        </td>
        
        <td   >
        <a href='superuserapproveuserview.php?number=$array[NO]&superuserid=$superuserid'> $array[TITLE]</a> 
           
        </td>
        
        <td  >
            <p align=center> $array[WRITER] </p>
        </td>
       
        <td >
            <p align=center> $array[SUPERUSER1] $array[SUPERUSER2] $array[SUPERUSER3]</p>
        </td>
        <td  >
            <p align=center> $ch </p>
        </td>
        <td >
            <p align=center> $array[DATE] </p>
        </td>
        
    </tr> 
    ");
        }
     
     }
     elseif(strcmp($c,$d) == 0 && $c2=="")
     {
     	if($a==$a2)
        {
        	if($b==$b2)
        	{
            		echo ("
    <tr>
        <td  >
            <p align=center>$array[NO]</p>
        </td>
        
        <td >
        <a href='superuserapproveuserview.php?number=$array[NO]&superuserid=$superuserid'> $array[TITLE]</a> 
           
        </td>
        
        <td  >
            <p align=center> $array[WRITER] </p>
        </td>
       
        <td >
            <p align=center> $array[SUPERUSER1] $array[SUPERUSER2] $array[SUPERUSER3]</p>
        </td>
        <td  >
            <p align=center> $ch </p>
        </td>
        <td >
            <p align=center> $array[DATE] </p>
        </td>
        
    </tr> 
    ");
        	}
        }
     
     }
     
       
   
    
 
}
?>
   
                      
           </table> 
               
            </div>         
                  
          </div> <!-- content 끝-->		
    </div><!-- page 끝-->
	
   
	
</body>
</html>
