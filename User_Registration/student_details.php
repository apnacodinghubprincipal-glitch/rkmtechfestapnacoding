<?php
//NEW SERVER_2022
include('connection.php');
date_default_timezone_set("Asia/Kolkata");
//------------------------------
//$otp=rand(10,1000000);  
//$_SESSION['otp']=$otp;
//print_r($_SESSION);

$SurName=strtoupper ($_POST['l_name']);
$Fname=strtoupper ($_POST['f_name']);
$dob_date_timestamp=$_POST['dob'];
$HealthStatus=strtoupper ($_POST['health_status']);
$SmsPhone=$_POST['sms_phone_no'];
$PresentAdd=addslashes(strtoupper ($_POST['present_address']));
$RasidentPhNo=$_POST['resodemce_phone_no'];
$BloodGroup=addslashes(strtoupper ($_POST['blood_group']));
$AdharNo=strtoupper ($_POST['adhar_no']);
$RegDate=date("d/m/Y");
$Password=rand(10,1000000);
$reportinfo=strtoupper ($_POST['report_info']);

$_SESSION['studentsurname']=$SurName;
$_SESSION['studentname']=$Fname;
$_SESSION['studentdob']=$dob_date_timestamp;
$_SESSION['healthstatus']=$HealthStatus;
$_SESSION['smsphnumber']=$SmsPhone;
$_SESSION['presentaddress']=$PresentAdd;
$_SESSION['residentphnumber']=$RasidentPhNo;
$_SESSION['bloodgroup']=$BloodGroup;
$_SESSION['adharno']=$AdharNo;
$_SESSION['regdate']=$RegDate;
$_SESSION['password']=$Password;
$_SESSION['reportinfo']=$reportinfo;

$insert=mysqli_query($conn,"insert into student_master set 
                                    
										surname='".$_SESSION['studentsurname']."',

										name='".$_SESSION['studentname']."',

										dob='".$_SESSION['studentdob']."',

										health_status='".strtoupper($_SESSION['healthstatus'])."',

										sms_phone_no='".$_SESSION['smsphnumber']."',

										present_address='".$_SESSION['presentaddress']."',

										resident_ph_no='".$_SESSION['residentphnumber']."',
									
										pass_word='".$_SESSION['password']."',

                                        adhar_no='".$_SESSION['adharno']."',

										blood_group='".$_SESSION['bloodgroup']."',										

										reg_date='".$_SESSION['regdate']."',

										reportinfo='".$_SESSION['reportinfo']."'										
");


 $StudentId=mysqli_insert_id($conn);
 $_SESSION['studentid']=$StudentId;
 //$year=date('Y')+1;     //+1 increment for finding session year.
 $year=date('Y');
 $reg_no = "ACHUB_".$year."_".$StudentId;
 
 //$reg_no = "ABSS_NUR_".$year."_".pad_to_six($StudentId);
 
 
 $_SESSION['reg_no']=$reg_no;
 
 $sql=mysqli_query($conn,"update student_master set reg_no='$reg_no' where id='$StudentId'");

	/*

 $stud_id=$_GET['std'];
 
 $aa= $_SESSION['sessionname'];
 $_SESSION['studentsurname'];
 $_SESSION['studentname'];
 $_SESSION['studentclass'];

 $_SESSION['stud_id']=$stud_id;
*/

// -----------------------------

	$stu_info = "SELECT * FROM student_master WHERE id = $StudentId";

      $stu_info = mysqli_query($conn,$stu_info);

	  $stud_info = mysqli_fetch_array($stu_info);
	  
// to send Reg_no of student for payment slip	  
 //$_SESSION['reg_no']=$stud_info['reg_no'];
 
	 //$img_info = "SELECT * FROM nursery_student_image_master WHERE student_id = $StudentId";
  	 //$img_info = mysqli_query($conn,$img_info);

	 //$imgg_info = mysqli_fetch_array($img_info);
	  //session_destroy();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>AGRASAIN BALIKA SIKSHA SADAN</title>

<link rel="stylesheet" type="text/css" href="css/main.css"/>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

<!--Given below link is given for controlling the display of photographs-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>
	
	// javascript code to display uploaded photographs in the box
		function readURL(input,prevId) 
		{
			var str=input.value+"";

			var pos = str.lastIndexOf('.');

			var ext=str.substring(eval(pos+1));

			var validation_array=new Array('jpg','png','jpeg','gif');

			if(validation_array.indexOf(ext) > -1)
			{

				//document.getElementById('image_b4').style.display = 'none';

				if (input.files && input.files[0]) 
				{
					var reader = new FileReader();
					reader.onload = function (e) 
					{
						$('#preview_' + prevId).html('<img src="'+e.target.result+'" style="height:120px;width:150px;" alt="" id="imgpre"/>');
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			else
			{
				alert('Invalid Image format');
				input.value='';
			}
		}

	</script>
	
<script>

function submit_to_family()

{

  document.frm.action="";

  document.frm.submit();

}

function do_edit(i)
{
//alert("hgghg");

window.open("edit_student_details.php?std=" + i ,"_self");
}
function do_exit()
{
  alert("THANK YOU! YOUR FORM IS SUCCESSFULLY SUBMITTED");
	window.location.href="index.php";
}
function go_to_acknowledgement(i)
{
 alert("Your Form has been Sucessfully filled and recorded in School database! Now print the Form , Bank Challen and Acknowledgement ");
 window.open("student_acknowledgement.php?std=" + i ,"_self");
}


$(document).ready(function() {

$("#dob").datepicker();

 	});
	
function print_page()
{
	var printButton = document.getElementById("print");
	printButton.style.visibility = 'hidden';
	var editButton = document.getElementById("edit");
	editButton.style.visibility = 'hidden';
	var exitButton = document.getElementById("exit");
	exitButton.style.visibility = 'hidden';
	window.print()
	printButton.style.visibility = 'visible';
	editButton.style.visibility = 'visible';
	exitButton.style.visibility = 'visible';
}

</script>
<style>
/* to set the size of pictures(signaturs) uploaded in the box */
#preview_5 img{
	height:55px !important;
}
	#preview_6 img{
	height:55px !important;
}
	#preview_7 img{
	height:55px !important;
}
</style>

<style type="text/css" media="print">
  @page { size: landscape; }
</style>

</head>

<body style="background:#99CC99;">
  
    <form name="frm" action="student_acknowledgement.php" method="post" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $_SESSION['reg_no']; ?>" name="stntid">
	
	<div style="width:1000px; background:#FFF; padding:30px; margin:0 auto;">
    
    	<div class="container">
            <div class="gt-top-bar default_width">
                <div class="gt-logo">
                    <img src="images/logo_new.jpg" style="margin:0 0 20px 0 auto;" alt="">
                </div>	
			</div>
		</div>

	<?php
 //     $tm = date("l, F d Y, H:i:s" );
		$tm1= date('l, d F Y',strtotime('3 weekdays'));
        $s_inf = mysqli_query($conn,"select reg_no,  reg_date, sms_phone_no, pass_word from student_master where id = '$reg_no' ");
        while($s_info = mysqli_fetch_array($s_inf))
        {
			$fname = mysqli_fetch_array(mysqli_query($connect,"select email from father_information_master where student_id = '$reg_no' "));
			$app = mysqli_fetch_array(mysqli_query($connect,"select app_date from student_app_master where student_id = '$reg_no' "));
            $r_no = explode("/", $s_info['reg_no']);
    ?>
            
           
		<h3 style="text-align:center; font-size:20px; color:darkblue;"><b>ONLINE REGISTRATION FORM NO : 
            <i style="font-size:22px;"> <?=$s_info['reg_no']?></b></h3>
 		
		<h3 style="text-align:center; color:darkblue;">NB: Please note the <font color="red">Registration number and password</font> 
        for further use.</h3>
        
           <span style="float:right;">Page 1 of 3</span>
		<table class="table_bor" style="background:#ECF4D0; margin:0 0 20px 0;  color:darkblue;" bordercolor=teal>
                <tr style="background-color:#ccd7a4;">
                    <td colspan="3" style="font-size:18px; margin-bottom:15px;">Website</td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Website</b></td>
                    <td style="text-align:centre; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><a href="https://www.apnacodinghubprincipal.com"></a>https://www.apnacodinghubprincipal.com</td>
                </tr>
                
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Registration ID<i style="font-size:14px; color:#FF0000;">(Note for enquiry purpose in future)</i></b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;color:#FF0000;"><?php echo $s_info['reg_no']; ?></td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Registered On</b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$s_info['reg_date']?></td>
                </tr>
                
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Mobile no. for SMS:</b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$s_info['sms_phone_no']?></td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Password <i style="font-size:14px;color:#FF0000;">(Note for enquiry purpose in future)</i></b></td>
                    <td style="text-align:center; width:2%;">::</td>
             		<td style="text-align:left; width:50%; color:#FF0000;"><?=$s_info['pass_word']?></td>
                </tr>
            </table>
            <?php
            }
            ?>
		
    	<table class="table_bor" style="background:#ECF4D0; margin:0 0 20px 0;  color:darkblue;" bordercolor=teal>

        	<tr style="background-color:#ccd7a4;">
            	<td colspan="4" style="font-size:18px;">Student's Information (Spelling as per Birth Certificate submitted)</td>
           </tr>

        	<tr style="font-size:16px;">
              <td width="31%"><b>Surname:</b> <i style="color:red;"> *</i></td>

                <td width="19%"><?=$stud_info['surname']?></td>

                <td width="34%"><b>First Name & Middle Name:</b> <i style="color:red;"> *</i> </td>

                <td width="17%"><?=$stud_info['name']?></td>
           </tr>

            <tr style="font-size:16px;">
            
                <td><b>Date of Birth:</b> <i style="color:red;"> *</i></td>
                <td><?=$stud_info['dob']?></td>

                <td><b>Health Status:<i style="color:red;"> *</i></b></td>
                <td><?=$stud_info['health_status']?></td>
           </tr>

     
            <tr style="font-size:16px;">
            
                <td><b>Mobile no. for SMS:<i style="color:red;"> *</i></b></td>

                <td><?=$stud_info['sms_phone_no']?></td>
            
                <td><b>Residence Phone No.:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['resident_ph_no']?></td>

           </tr>
            
            <tr style="font-size:16px;">
            	<td><b>Blood Group.:<i style="color:red;"> *</i></b></td>
               
				<td><?=$stud_info['blood_group']?></td>
               
				<td><b>Aadhar card.:</b></td>
               
				<td><?=$stud_info['adhar_no']?></td>
            </tr>
       
             <tr style="font-size:16px;">
            	<td><b>Present Address:</b></td>

                <td colspan="3"> <?=$stud_info['present_address']?></td>

            </tr>
        <tr style="font-size:16px;">
            	<td><b>Report information about your problem:</b></td>

                <td colspan="3"> <?=$stud_info['reportinfo']?></td>

            </tr>
        </table>
		
      	 
<div class="row">
		
			<div class="col-md-4">
			<div id="preview_1" class="img-thumbnail">
            	<p style="text-align:center; margin:30px 0 0 0; font-size:12px; color:darkblue;">Please upload a recent<br> photo of<br>
                 candidate here<br> Size- below 200KB</p>
            </div>
				<input type="file" name="thumb" id="thumb" required onchange="readURL(this,1);" class="form-control"/>
			</div>

       <div class="row">
		<div class="col-md-4">
			<div id="preview_8" class="img-thumbnail">
            	<p style="text-align:center; margin:30px 0 0 0; font-size:12px; color:darkblue;">Please upload a <br />Image of<br/> 
                Issue reporting here <br /> Postcard Size- 225KB to 350KB</p>
            </div>
				<input type="file" name="thumb7" id="thumb7" required onchange="readURL(this,8);" class="form-control"/>
			</div>
			</div>
			
        <div class="next_btn" style="width:130px;">
            <input type="submit" id="print" value="SUBMIT TO SAVE & CONTINUE"/>
        </div>
        <div style="text-align:center; font-size:16px; color:#0000ff; margin:40px 0 0 0;">
        <i style="color:red;">** Click SUBMIT BUTTON once only to, save and upload photographs. 
			Please wait till you are redirected to Next Page. **</i></div>
   
    </div>
    
    </div>

    </form>

</body>

</html>

