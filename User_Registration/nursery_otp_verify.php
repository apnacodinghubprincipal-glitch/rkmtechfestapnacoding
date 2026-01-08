<?php
include("config/connect1.php");
/*session_start();
	$user="absslilu_user";
	$pwd="O&24]bhj8@7$";
	$host="localhost";
	$db="absslilu_db";
	$connect=mysqli_connect($host,$user,$pwd,$db);
*/

//How to Implement OTP SMS Mobile Verification in PHP 
//nursery_testotp_2021_22

   $select="select * from nursery_testotp where otp='".$_SESSION['otp']."'";
    $query=mysqli_query($connect,$select);
    $row=mysqli_fetch_assoc($query);
    $total=mysqli_num_rows($query);
    
 $row['status'];
//After OTP varification status is getting updateed to 'Y' in place of 'N'. Status1 is being created for updating the vatification status in student master file.
 if($row['status']=='Y'){
    $_SESSION['status1']=$row['status'];
    header('location:Bank_statement.php');
    }

 $name= $_SESSION['name_surname'];

if($_POST['verify']){
    $status="Y";
    
    $select1="select * from nursery_testotp where otp='".$_POST['otp']."'";
    $query1=mysqli_query($connect,$select1);
    $row1=mysqli_fetch_assoc($query1);
    $total2=mysqli_num_rows($query1);
  
    $id=$row1['id'];
    
    if($total2!=''){
    $update="update nursery_testotp set status='".$status."' where id='".$id."'";
    mysqli_query($connect,$update);
    //echo "<script>alert('Successfully Verified !!!')</script>";
    header('location:Bank_statement.php');
    }
    else{
    echo "<script>alert('You have entered wrong OTP')</script>";
    }
 
}

	?>
<!--	<h1>Enter your OTP recevied in SMS mobile no.</h1>  80cd33-->
<body style="background:#99CC99;">
<form name="form1" id ="reg-form" method="post" enctype="multipart/form-data">
     <table width="556" height="356" style="margin:98px auto; border-radius:8px; border:2px solid #CCC; padding:10px; -webkit-box-shadow: 0px 0px 27px 1px rgba(0,0,0,0.3);
-moz-box-shadow: 0px 0px 27px 1px rgba(0,0,0,0.3);
box-shadow: 0px 0px 27px 1px rgba(0,0,0,0.3);
background:#cde9d6; bordercolor=teal">

    <tr style="background:#ECF4D0; font-size:28px; text-align:center; color:darkblue;">
        <th colspan="2"><u>Verification of OTP </u></th>
    </tr>
    
    <tr>
        <td style="font-size:28px; text-align:center; color:darkblue;">Enter your OTP :</td>
        <td ><input type="text" name="otp" style="width:95%; height:46px; font-size:24px; text-align:center;"></td>
    </tr>
    <tr>
        <th colspan="2" style="font-size:18px; color:red; text-align:left;">(Recevied in SMS Mobile number.)</i></th>
    </tr>
    <tr><td colspan="2"><hr></td></tr>
    <tr>
        <td></td>
        <td><input type="submit" name="verify" value="Verify OTP" style="width:45%; height:36px; font-size:20px; text-align:center;"></td>
    </tr>
</table>
</form>
</body>