<?
$userid = $_GET['userid'];  

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



</head>

<body>	

	<!-- 메인 페이지-->
    <div data-role="page" id="main">
    	<div id ="head" data-role="header">     
			<h2 id="logo">유저 페이지</h2>
        </div>         
        
             
             <div id ="content" data-role="content" data-theme="d" >
             
            <div id="hmenu"> 
 <ul> 
   <li><h4><?=$userid?> 님</h4></li> 
   <li> <a href="userboard.php?userid=<?=$userid?>"> 공지 사항 </a></li> 
   <li><a href="approverequest.php?userid=<?=$userid?>"> 결재 올리기 </a></li> 
   <li> <a href="approveprogress.php?userid=<?=$userid?>"> 진행 상황</a></li> 
  
 </ul>   
 </div> 
            
            <div align="center" data-role="content" data-theme="d" > 
               
 
<form enctype="multipart/form-data" action="requestDB.php?userid=<?=$userid?>" method="post" data-ajax="false">
  <table border=0 cellspacing=1 cellpadding=0 >
         <tr>
          <td align=center>
            <font color=green><b>결제 요청</b></font>
              
           </td>
          </tr>
 </table>
 
 <table border=0 bgcolor=#CCCCF><tr><td>
 
  <table border=0  cellspacing=0 cellpadding=0 bgcolor=#F0F0F0>
 
         
 
         <tr>
          <td colspan=2>
             <table border=0 cellspacing=0 cellpadding=0 >
                    <tr>
                         <td style="width:80px" align=right><b>제  목 </b></td>
                       <td><input type=text name=title size=20  maxlength=20></td>                        
                        
                     </tr>
                         </table>
            </td>
         </tr>
 
          <tr><td bgcolor=white height=1 colspan=2></td></tr>
          
         
 
           <tr>
            <td style="width:80px" align=right><b>내용 </b></td>
            <td valign=top>
            <textarea wrap="off" name=content style="height:200px;width:300px;"></textarea>
           </td>
          </tr>
 			
           
         
 			<tr>
           <td  style="width:80px" align=right><b>결재자1 </b></td>
           <td> <input type=text name=approval1 > </td>
         </tr>
         <tr>
           <td style="width:80px" align=right><b>결재자2 </b></td>
           <td> <input type=text name=approval2 > </td>
         </tr>
         <tr>
           <td style="width:80px" align=right><b>결재자3</b></td>
           <td> <input type=text name=approval3 > </td>
         </tr>
         <tr><td bgcolor=white height=1 colspan=2></td></tr>
        
        <tr>
           <td align=right><b>파일 </b></td>
           <td> <input type=file name="file"  > </td>
         </tr>
			
            
         <tr><td bgcolor=white height=1 colspan=2></td></tr>
        
  
  </table>
             
 
  </td></tr>
  <tr>
  <td align=right>
   <div align=right style="width:200px; " >
            <input id="btn_insert" type="submit" value="확인">
        </div>
  </td>
  </tr>
  
  </table>
  
  </form>
            </div>         
               
          </div> <!-- content 끝-->		
    </div><!-- page 끝-->
	
   
	
</body>
</html>
