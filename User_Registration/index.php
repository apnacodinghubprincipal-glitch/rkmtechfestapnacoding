<?php 
include('connection.php');

/* database connection file import



 
$getpage = "SELECT * FROM cms WHERE id ='2'";
$getpage = mysqli_query($connect,$getpage);

//$getpage = mysqli_query($getpage) or die(mysql_error());

$getpage = mysqli_fetch_array($getpage);

//$yearnow= date("Y");
//$a=explode("20",$yearnow+1);

$getsession= "SELECT * FROM cms WHERE id ='13'";
//echo $getsession;
$getsession = mysqli_query($connect,$getsession);
//$getsession = mysqli_query($getsession) or die(mysqli_error());

$getsession = mysqli_fetch_array($getsession);
*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>ONLINE REGISTRATION PROGRAMME</title>

<link rel="stylesheet" type="text/css" href="css/main.css" />

<style>
	.online_btn{ width:524px; height:55px; background:url(images/online_btn.jpg) repeat-x 0 0; margin:20px auto; -webkit-box-shadow: 0px 0px 23px 1px rgba(0,0,0,0.3);
-moz-box-shadow: 0px 0px 23px 1px rgba(0,67,0,0.3);
box-shadow: 0px 0px 23px 1px rgba(0,67,0,0.3); border-radius:5px; text-align:center; font-size:20px; line-height:55px;}
.online_btn a{ text-decoration:none; color:#FFF;}

.menu_box{ width:280px; margin:0 auto; border-radius:4px; background:url(images/menu_back.jpg) repeat-x 0 0; height:44px;}
.menu_box ul{ padding:0; margin:0;}
.menu_box ul li{ float:left; list-style:none; line-height:44px; background:url(images/divider.png) no-repeat 0 5px;}
.menu_box ul li a{ text-decoration:none; color:#FFF; padding:0 75px; display:block;}
.menu_box ul li a.active,.menu_box ul li a:hover{ color:#003;}
</style>
</head>

	
<!--<body style="background:#af5516;">-->
    <body style="background:#99CC99;">
 	<div style="background:#FFF; width:1000px; height:470px; margin:100px auto; overflow:hidden; position:relative;">
  	
	<div style="width:1000px; background:#FFF; padding:10px; margin:0 auto;">
    <!-- /* include("header.php"); ?>	  */ -->
	
	<div class="container">
            <div class="gt-top-bar default_width">
                <div class="gt-logo">
                    <a href="#"><img src="images/logo_new.jpg" alt=""></a>
                </div>	
	</div>
    <BR>
	<!-- instruction to upload photograph   -->
	<table class="table_bor" style="background:#ECF4D0; width:900px; margin:0 auto; padding:10 10 10px 10 auto; " bordercolor=teal>
	
    <tr>
	<td style="font-size:16px; text-align:center; background:#FFA343";>	
	<b><i style="color:darkblue;"><u>PRELIMINARY PREPARATION: </u><br>
	KEEP THE FOLLOWING THINGS READY BEFORE YOU PROCEED FOR ONLINE REGISTRATION AND TO UPLOAD THE PHOTOGRAPH. PLEASE READ THE GUIDELINES GIVEN BELOW CAREFULLY.</i></b>
	</td></tr>
	
	<tr>
	<td style="font-size:16px; text-align:left;";>	
	<b><i style="color:darkblue;">A.  Please keep your Latest Passport size Photograph's scanned copy ready in any one of '.jpg', '.png', '.jpeg' or '.gif' file format only.</i></b></td>
	</tr>
	
		
<tr><td style="font-size:16px;"><b><i style="color:darkblue;">B.  Click on the Submit Button and wait till images are uploaded upto 100%, uploading bar is displayed at the bottom left corner. Please don't Click on the Submit Button multiple times, it will start from 0% for each and every click.</i></b><br>
</td> </tr>
<tr><td style="font-size:16px;"><b><i style="color:red;">NB: In case of any confusion or difficulty, please call our help line number 9330162927 between 9.30am. to 3pm.</b></td> </tr>
 </table>
<h2 style="text-align:center; "><i style="color:darkblue;">Please click <a id="myBtn" href="student_information.php"> "ONLINE REGISTRATION PROGRAMME" </a></i></h2>


<!--<div class="online_btn"><a id="myBtn" href="student_information.php">ONLINE REGISTRATION PROGRAMME <?php echo $year(); ?> </a></div>

	<div class="menu_box">
        <ul>
            <li><a href="login.php">USER lOGIN </a></li>
        </ul>
    </div>	

</div> -->

</body>

</html>