<?
mysql_connect("localhost", "root", "apmsetup") or die (mysql_error());  mysql_select_db("choigoon7"); 
 
 mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
 
$tablename="document";
 $superuserid = $_GET['superuserid'];
$number = $_GET['number'];  
 
$query = "select * from $tablename where NO='$number'"; 
$result = mysql_query($query) or die (mysql_error());

$array = mysql_fetch_array($result);
 

 
mysql_query($query);
 
?>
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
<STYLE TYPE="text/css">
BODY,TD,SELECT,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-family:굴림;font-size:9pt;color:#555555;}
A:link    {color:black;text-decoration:none;}
A:visited {color:black;text-decoration:none;}
A:active  {color:black;text-decoration:none;}
A:hover  {color:gray;text-decoration:none;}
</STYLE>
</head>

<body>	


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
<form action="superuserapprovemodify.php?number=<?=$array[NO]?>&superuserid=<?=$superuserid?>" method="post" data-ajax="false">               
              <table border=0 cellspacing=1 cellpadding="3">
        <tr>
          <td align=center>
          <font color=green><b>결재 보기</b></font>
          </td>
        </tr>
    <tr>
          <td bgcolor="#EAC3EA">
<table border=0 cellspacing=1 cellpadding=0  bgcolor="white">
        <tr>
          <td width="100">
            <p align="right"><b>제  목 &nbsp;</b></p>
 
          </td>
          <td >
                        <p><? echo "$array[TITLE]"; ?></p>
          </td>
          
        </tr>
                <tr>
          <td width="100">
                        <p align="right"><b>작성자 &nbsp;</b></p>
          </td>
          <td colspan="3">
                        <p><? echo "$array[WRITER]"; ?></p>
          </td>
                </tr>
                
        <tr>
          <td width="100">
                        <p align="right"><b>내  용 &nbsp;</b></p>
          </td>
          <td colspan="3">
                       <p><? 
							$c=nl2br($array[CONTENT]);
							echo "$c"; 
						?></p>
          </td>
        </tr>
        <tr>
          <td width="100">
                        <p align="right"><b>파  일 &nbsp;</b></p>
          </td>
          <td colspan="3">
                        							
						
						<a  data-ajax="false"  href="download.php?no=<?=$array[NO]?> "> <? echo "$array[FILENAME]"; ?></a> 
                                               
                                  </td>
        </tr>
       <tr>
          <td width="100">
                        <p align="right"><b>1결재자 &nbsp;</b></p>
          </td>
          <td colspan="3">
                        <p><?
							
								echo "$array[SUPERUSER1] "; 
							
						?></p>
          </td>
        </tr>
        
         <tr>
          <td width="100">
                        <p align="right"><b>2결재자 &nbsp;</b></p>
          </td>
          <td colspan="3">
                        <p><?
							
								echo "$array[SUPERUSER2] "; 
							
						?></p>
          </td>
        </tr>
        
         <tr>
          <td width="100">
                        <p align="right"><b>3결재자 &nbsp;</b></p>
          </td>
          <td colspan="3">
                        <p><?
							
								echo "$array[SUPERUSER3]"; 
							
						?></p>
          </td>
        </tr>
        
         <tr>
          <td width="100">
                        <p align="right"><b>결재완료 &nbsp;</b></p>
          </td>
          <td colspan="3">
                        <p><? 
							if($array[SUPERUSERCOUNT]==0)
							{
								echo"결재완료";
							}
							else{
								echo "$array[SUPERUSER1_CHECKED] $array[SUPERUSER2_CHECKED] $array[SUPERUSER3_CHECKED]"; 
							}
						?></p>
          </td>
        </tr>
</table>
     <?

if( trim($superuserid) == trim($array[WRITER]) )
{
	echo' 
				 <tr>
  				<td align=right>
   					<div align=right style="width:200px; " >
					<input type="submit" value="수정" />
 				</div>
  				</td>
 				 </tr>
	';
}


?>
           
</table>
     </form>           
            </div>         
               
          </div> <!-- content 끝-->		
    </div><!-- page 끝-->
	
   
	
</body>
</html>












 