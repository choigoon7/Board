<?php

mysql_connect("localhost", "root", "apmsetup") or die (mysql_error());  
mysql_select_db("choigoon7"); 

$tablename="bbs";
if($page == '') $page = 1; 
$list_num = 10;
$page_num = 10; 
$offset = $list_num * ($page-1); 
 
$query="select count(*) from $tablename"; 
$result=mysql_query($query) or die (mysql_error()); 
$row=mysql_fetch_row($result); 
$total_no=$row[0]; 
 

$total_page=ceil($total_no/$list_num); 
$cur_num = $total_no - $list_num * ($page-1); 
 

$query="select * from $tablename order by number desc limit $offset, $list_num"; 
$result=mysql_query($query) or die (mysql_error()); 

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
#content{
	 width: 100%;
}

.ui-block-b {
    
   
  
   margin-left:20px;
}
 #h3{
	 margin-left:20px;
 }
 
</style>

</head>

<body>	
	<!-- 메인 페이지-->
    <div data-role="page" id="main">
    	<div id ="head" data-role="header">     
			<h2 id="logo">테스트중입니다.</h2>
        </div>         
        <div id ="content" data-role="content" data-theme="d" >
             
             <fieldset class="ui-grid-a">  
                  
          <div class="ui-block-a" style=width:150px data-role="content" data-inset="true" data-theme="c"> 
                                      
             <h3 >공지 사항</h3>    
             <a href="index.html">
                          <h3 id="h3">공지 사항</h3>
                       </a>
                
                <h3 >결재 관련</h3>
                <a href="#page3">
                            <h3 id="h3">결재 요청</h3>
                       </a>
                <a href="#page3">
                            <h3 id="h3">결재 진행</h3>
                       </a>
                       <a href="#page3">
                            <h3 id="h3">결재 거절</h3>
                       </a>
                <a href="#page3">
                            <h3 id="h3">결재 완료</h3>
                       </a>   
                
            </div> 
            
            <div class="ui-block-b" style=width:80%> 
               
               <table border=1 cellspacing=0 width:100% bordercolordark=white bordercolorlight=#999999>
    <tr>
        <td width:10% bgcolor=#CCCCCC>
            <p align=center>no</p>
        </td>
        <td width:50% bgcolor=#CCCCCC width=490>
            <p align=center>제  목</p>
        </td>
        <td width:20% bgcolor=#CCCCCC>
            <p align=center>작성자</p>
        </td>
        <td width:20% bgcolor=#CCCCCC>
            <p align=center>날  짜</p>
        </td>
       
    </tr>     
    
    <?
while ($array=mysql_fetch_array($result)) 
{
 
        $date=date("Y/m/d", $array[writetime]); 
 
        echo "
    <tr>
        <td width:10% >
            <p align=center>$cur_num</p>
        </td>
        <td width:50%  width=490>
            <p> $array[subject]</p>
        </td>
        <td width:20% >
            <p align=center> $array[name] </p>
        </td>
        <td width:20% >
            <p align=center> $date </p>
        </td>
        
    </tr> ";
 
        $cur_num --;
 
}
?>
    
    <tr>
        <td width=100% colspan=5>
            <p align=center><a href='write.php'>[글쓰기]</a></p>
        </td>
    </tr>
                      
           </table>
                
            </div>         
                </fieldset>   
          </div> <!-- content 끝-->		
    </div><!-- page 끝-->
	
   
	
</body>
</html>
