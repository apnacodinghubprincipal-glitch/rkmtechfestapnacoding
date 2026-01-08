<?php
//NEW SERVER_2022

//include('config/connect.php');
date_default_timezone_set("Asia/Kolkata");
  
 
 $stud_id=$_GET['std'];
 
 $aa= $_SESSION['sessionname'];
 $_SESSION['studentsurname'];
 $_SESSION['studentname'];
 $_SESSION['studentclass'];

 $_SESSION['stud_id']=$stud_id;

	$stu_info = "SELECT * FROM student_master WHERE id = $stud_id";

      $stu_info = mysqli_query($connect,$stu_info);

	  $stud_info = mysqli_fetch_array($stu_info);
	  
// to send Reg_no of student for payment slip	  
 $_SESSION['reg_no']=$stud_info['reg_no'];
 

	  $fat_info = "SELECT * FROM father_information_master WHERE student_id = $stud_id";

      $fat_info = mysqli_query($connect,$fat_info);

	  $fath_info = mysqli_fetch_array($fat_info);
	  

	  $mot_info = "SELECT * FROM mother_information_master WHERE student_id = $stud_id";

      $mot_info = mysqli_query($connect,$mot_info);

	  $moth_info = mysqli_fetch_array($mot_info);


	  $lc_info = "SELECT * FROM local_guardian_master WHERE student_id = $stud_id";

      $lc_info = mysqli_query($connect,$lc_info);

	  $loc_info = mysqli_fetch_array($lc_info);
	  

	  $img_info = "SELECT * FROM nursery_student_image_master WHERE student_id = $stud_id";

      $img_info = mysqli_query($connect,$img_info);

	  $imgg_info = mysqli_fetch_array($img_info);
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

<!--<form name="frm" action="family_information.php" method="post" enctype="multipart/form-data"> -->  
    <form name="frm" action="student_acknowledgement.php" method="post" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $_SESSION['stud_id']; ?>" name="stntid">
	<!--	<input type="hidden" value="<?php echo $_SESSION['studentid']; ?>" name="stntid">-->
	

	<div style="width:1000px; background:#FFF; padding:30px; margin:0 auto;">
    <?php include("header.php"); ?>
	<?php
 //     $tm = date("l, F d Y, H:i:s" );
		$tm1= date('l, d F Y',strtotime('3 weekdays'));
        $s_inf = mysqli_query($connect,"select session, reg_no, class, reg_date, sms_phone_no, pass_word from student_master where id = '$stud_id' ");
        while($s_info = mysqli_fetch_array($s_inf))
        {
			$fname = mysqli_fetch_array(mysqli_query($connect,"select email from father_information_master where student_id = '$stud_id' "));
			$app = mysqli_fetch_array(mysqli_query($connect,"select app_date from student_app_master where student_id = '$stud_id' "));
            $r_no = explode("/", $s_info['reg_no']);
    ?>
            
           
		<h3 style="text-align:center; font-size:20px; color:darkblue;"><b>ONLINE REGISTRATION FORM NO : <i style="font-size:22px;"> <?=$s_info['reg_no']?> </i>FOR <br>CLASS <i style="font-size:22px;"><?=$s_info['class']?> </i>SESSION <i style="font-size:20px;"><?=$s_info['session']?></i></b></h3>
 
         <!--<h5 style="text-align:center;">NB: Please submit this form at school reception on or before <?=$app['app_date']?> between <?=$app['app_time']?></h5>-->
		<!-- - within 3 workingdays applicable for forms collected/dowdloated between 15th to 22nd October, 2019
		<h3 style="text-align:center;">Please submit this form at school reception <font color="red">within 3 working days</font> </h3> -->
		
		<!-- - forms collected/dowdloated between 23rd, 24th and 25th October,2019 will submit the same by Thursday 31st October 2019 within 12.00 noon.<--> 
	<!-- 	<h5 style="text-align:center;font-size:16px;">NB: Parents downloading forms on <i style="font-size:22px;"> <i style="color:red;">23rd, 24th and 25th October,2019 </i></i>will please</h5>
	<h5 style="text-align:center;font-size:16px;">submit the form positively by<i style="font-size:22px;"> <i style="color:red;"> Thursday. 31st October. 2019 within 12.00 noon.</i></i></h5>-->
		
		<h3 style="text-align:center; color:darkblue;">NB: Please note the <font color="red">Registration number and password</font> for further Admission Process</h3>
          <!--  <h3 style="text-align:center;">Overwriting on the Admission Form is not allowed</h3>-->
           <span style="float:right;">Page 1 of 3</span>
		<table class="table_bor" style="background:#ECF4D0; margin:0 0 20px 0;  color:darkblue;" bordercolor=teal>
                <tr style="background-color:#ccd7a4;">
                    <td colspan="3" style="font-size:18px; margin-bottom:15px;">Website</td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Website</b></td>
                    <td style="text-align:centre; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><a href="https://www.abssliluah.com"></a>https://www.abssliluah.com</td>
                </tr>
                
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Registration ID<i style="font-size:14px; color:#FF0000;">(Note for enquiry purpose by parents in future)</i></b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;color:#FF0000;"><?php echo $s_info['reg_no']; ?></td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Registered On</b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$s_info['reg_date']?></td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>E-mail ID <i style="font-size:12px;">(parents)</i></b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$fname['email']?></td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Mobile no. for SMS:</b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$s_info['sms_phone_no']?></td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Password <i style="font-size:14px;color:#FF0000;">(Note for enquiry purpose by parents in future)</i></b></td>
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
            	<td><b>Class:</b> <i style="color:red;"> *</i></td>

                <td>
               <?=$stud_info['class']?>
                                
                </td>

                <td><b>Date of Birth:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['dob']?></td>
           </tr>

         <!--    <tr style="font-size:16px;">
            	<td><b>Nationality:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['nationality']?></td>

                <td><b>Religion:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['religion']?></td>
           </tr>-->

            <tr style="font-size:16px;">
           		<td><b>Caste(Pl. submit Certificate):</b><i style="color:red;"> *</i></td>

                <td><?=$stud_info['caste']?></td>

                <td><b>Mother Tongue:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['mother_tounge']?></td>
            </tr>

            <tr style="font-size:16px;">
            	<td><b>Birth Place(Dist. & State):</b><i style="color:red;"> *</i></td>

                <td><?=$stud_info['birth_place']?></td>

                <td><b>Home Locality:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['home_locality']?></td>
            </tr>

            <tr style="font-size:16px;">
            	<td><b>Mode of Transportation to ABSS:<i style="color:red;"> *</i></b></td>

                <td><?=$stud_info['mode_of_transporation']?></td>

                <td><b>Health Status:<i style="color:red;"> *</i></b></td>

                <td><?=$stud_info['health_status']?></td>
            </tr>

        <!--    <tr style="font-size:16px;">
            	<td><b>Permanent Mark of Identification:</b></td>

                <td><?=$stud_info['parmanent_mark_indentification']?></td>

                <td><b>Name, Class & ID No. of Sister/s Reading in ABSS:</b></td>

                <td><?=$stud_info['name_class_id_of_sister']?></td>
           </tr>-->

            <tr style="font-size:16px;">
            	<td><b>Nearest Railway Station:</b></td>

                <td><?=$stud_info['nearest_rail_station']?></td>

                <td><b>Mobile no. for SMS:<i style="color:red;"> *</i></b></td>

                <td><?=$stud_info['sms_phone_no']?></td>
           </tr>
            
            <tr style="font-size:16px;">
            	<td><b>Blood Group.:<i style="color:red;"> *</i></b></td>
               
				<td><?=$stud_info['blood_group']?></td>
               
				<td><b>Aadhar card.:</b></td>
               
				<td><?=$stud_info['adhar_no']?></td>
            </tr>

            <tr style="font-size:16px;">
              <td><b>Residence Phone No.:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['resident_ph_no']?></td>

                <td><b>Head of Family:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['head_of_family']?></td>
           </tr>

          <!--  <tr style="font-size:16px;">
                <td><b>Previous School:</b></td>

                <td><?=$stud_info['prev_shool']?></td>
                
	           	<td><b>Previous Class:</b></td>

                <td><?=$stud_info['prev_class']?></td>
          </tr>-->
            
             <tr style="font-size:16px;">
            	<td><b>Present Address:</b></td>

                <td colspan="3"> <?=$stud_info['present_address']?></td>

            </tr>
         <!--   <tr style="font-size:16px;">
            	<td><b>Why Choosing ABSS for Studies:</b></td>

                <td colspan="3"><?=$stud_info['why_choose_abss']?></td>
            </tr>-->

        </table>
		
        <table class="table_bor" style="background:#ECF4D0; margin:0 0 20px 0; color:darkblue;" bordercolor=teal>

        	<tr style="background-color:#ccd7a4;">
            	<td colspan="4" style="font-size:18px;">Father's Information (Spelling as per Birth Certificate submitted)</td>
           </tr>

        	<tr style="font-size:16px;">
            	<td width="23%"><b>Name:</b><i style="color:red;"> *</i></td>

                <td width="27%"><?=$fath_info['name']?></td>

                <td width="23%"><b>Qualification:</b><i style="color:red;"> *</i></td>

                <td width="27%"><?=$fath_info['qualification']?></td>
            </tr>

            <tr style="font-size:16px;">
            	<td><b>Profession/Post Held:</b><i style="color:red;"> *</i></td>

                <td><?=$fath_info['profesion']?></td>

                <td><b>Office Address:</b><i style="color:red;"> *</i></td>

                <td><?=$fath_info['full_address']?></td>
            </tr>

            <tr style="font-size:16px;">
            	<td ><b>Name of Organization:</b><i style="color:red;"> *</i></td>

                <td><?=$fath_info['fa_company_name']?></td>

                <td><b>Monthly Income:</b><i style="color:red;"> *</i></td>

                <td><?=$fath_info['monthly_incom']?></td>
            </tr>

            <tr style="font-size:16px;">
            	<td><b>Email:</b></td>

                <td><?=$fath_info['email']?></td>

                <td><b>Phone No.:</b><i style="color:red;"> *</i></td>

                <td><?=$fath_info['ph_no']?></td>
            </tr>

        </table>

        <table class="table_bor" style="background:#ECF4D0; margin:0 0 20px 0; color:darkblue;" bordercolor=teal>

        	<tr style="background-color:#ccd7a4;">
            	<td colspan="4" style="font-size:18px;">Mother's Information (Spelling as per Birth Certificate submitted)</td>
            </tr>

        	<tr style="font-size:16px;">
            	<td width="23%"><b>Name:</b><i style="color:red;"> *</i></td>

                <td width="27%"><?=$moth_info['name']?></td>

                <td width="23%"><b>Qualification:</b><i style="color:red;"> *</i></td>

                <td width="27%"><?=$moth_info['qualification']?></td>
            </tr>

            <tr style="font-size:16px;">
            	<td><b>Profession/Post Held:</b><i style="color:red;"> *</i></td>

                <td><?=$moth_info['profesion']?></td>

                <td><b>Office Address(If working):</b></td>

                <td><?=$moth_info['full_address']?></td>
            </tr>

            <tr style="font-size:16px;">
            	<td><b>Name of Organization:</b></td>

                <td><?=$moth_info['ma_company_name']?></td>

                <td><b>Monthly Income:</b></td>

                <td><?=$moth_info['monthly_incom']?></td>
            </tr>

            <tr style="font-size:16px;">
            	<td><b>Email:</b></td>

                <td><?=$moth_info['email']?></td>

                <td><b>Phone No.:</b><i style="color:red;"> *</i></td>

                <td><?=$moth_info['ph_no']?></td>
            </tr>

        </table>

        <table class="table_bor" style="background:#ECF4D0; margin:0 0 20px 0; color:darkblue;" bordercolor=teal>

        	<tr style="background-color:#ccd7a4;">
            <td colspan="4" style="font-size:18px;">Local Guardian's Information </td></tr>

        	<tr style="font-size:16px;">
            	<td width="23%"><b>Name:</b></td>

                <td width="27%"><?=$loc_info['name']?></td>

                <td width="23%"><b>Qualification:</b></td>

                <td width="27%"><?=$loc_info['qualification']?></td>
           </tr>

            <tr style="font-size:16px;">
            	<td><b>Profession/Post Held:</b></td>

                <td><?=$loc_info['profesion']?></td>

                <td><b>Residential Address:</b></td>

                <td><?=$loc_info['full_address']?></td>
           </tr>

            <tr style="font-size:16px;">
            	<td><b>Phone No.:</b></td>

                <td><?=$loc_info['ph_no']?></td>

                <td><b>Monthly Income:</b></td>

                <td><?=$loc_info['monthly_incom']?></td>
           </tr>

            <tr style="font-size:16px;">
            	<td><b>Email:</b></td>

                <td><?=$loc_info['email']?></td>

                <td><b>Relation (With Student)</b></td>

                <td> <?=$loc_info['relation']?></td>
            </tr>

        </table>

        <?php include("header.php");?>
     <br>

	<!-- instruction to upload photograph and signature  -->
	<table class="table_bor" style="background:#ECF4D0; width:900px; margin:0 auto; padding:10 10 10px 10 auto; " bordercolor=teal>
	
    <tr>
	<td style="font-size:16px; text-align:center; background:#f6e410";>	
	<b><u><i style="color:red;">PRELIMINARY PREPARATION: <br>KEEP THE FOLLOWING THINGS READY BEFORE YOU PROCEED FOR ONLINE REGISTRATION AND TO UPLOAD THE PHOTOGRAPH. PLEASE READ THE GUIDELINES GIVEN BELOW CAREFULLY.</i></u></b>
	</td></tr>
	
	<tr>
	<td style="font-size:18px; text-align:left;";>	
	<b><i style="color:red;">A.  Please keep your scanned copies ready in any one of  '.jpg', '.png', '.jpeg', '.gif' file format only.</i></b></td>
	</tr>
	<tr><td style="font-size:16px;"><b><i style="color:darkblue;">	 
	(i) Latest Passport size Photographs of - Student, Father, Mother and Local Guardian(if any)<br>
	(ii) Full Signatures of - Father, Mother and Local Guardian(if any)<br>
	(iii) Postcard size Photograph of - Birth Certificate
	</td>
	</tr>
	<tr><td style="font-size:16px;"><b><i style="color:darkblue;">	
		(iv) Full signature should be done in black ink on a plain white paper and should not be smudged.<br><span class="blinking"><b><i style="color:red;"> NOTE : Focus on the Signature and crop/ cut white space around the Photos and Signatures.</i></b></span>
		<br>
		(v) Please keep size of all images uploaded between 500 KB and 1000 KB.	
	</td> </tr>	
	<tr><td style="font-size:16px;"><b><i style="color:darkblue;">
	(vi)	In case, any parent is expired, please upload: Name of the parent, with 'Late' as prefix in place of Signature.<br>
	</td> </tr>	
	<tr><td style="font-size:16px;"><span class="blinking"><b><i style="color:red;">B.  Must Rename the Photograph, Signature and Birth Certificatefiles with the Student's Name as per following illustrative example before uploading. Don't upload with name of "WhatsApp Image........" It creates error in the image file and replace your photographs with any others image and signature.</i></b></span> <br><b><i style="color:darkblue;">
(i) Let your ward name be : Sunita Singh<br>
(ii) Then name your(Sunita)'s Passport size photograph as : SunitaSingh_student<br>
(iii) Father's Passport size photograph as : SunitaSingh_F<br>
(iv) Mother's Passport size photograph as : SunitaSingh_M<br>
(v) Local guardian's Passport size photograph as : SunitaSingh_LG<br>
(vi) Father's Signature as : SunitaSingh_FS<br>
(vii) Mother's Signature as : SunitaSingh_MS<br>
(viii) Local Guardian's Signature as : SunitaSingh_LGS<br>
(ix)    Birth Certificate as : SunitaSingh_BC
</td> </tr>	

<tr><td style="font-size:16px;"><b><i style="color:red;">C.  Click on the Submit Button and wait till images are uploaded upto 100%, uploading bar is displayed at the bottom left corner. Please don't Click on the Submit Button multiple times, it will start from 0% for each and every click.</i></b><br>
</td> </tr>
<tr><td style="font-size:16px;"><b><i style="color:darkblue;">NB: In case of any confusion or difficulty, please call our help line number 9330162927 between 9.30am. to 3pm.</b></td> </tr>
 </table>	
		<br>
		 
<div class="row">
		
	<!--	<table class="table_bor"  bordercolor=teal>

        	<tr>
				<td align="center">Photograph of Student</td>

            	<td align="center">Photograph of Father</td>

                <td align="center">Photograph of Mother</td>

                <td align="center">Photograph of Local Guardian</td>

            </tr>
			<tr>
			<td>-->
			<div class="col-md-3">
			<div id="preview_1" class="img-thumbnail">
            	<p style="text-align:center; margin:30px 0 0 0; font-size:12px; color:darkblue;">Please upload a recent<br> photo of<br> candidate(student) here <br> Size 25mm*30mm</p>
            </div>
				<input type="file" name="thumb" id="thumb" required onchange="readURL(this,1);" class="form-control"/>
			</div>
		<!--</td>
			<td>-->
			<div class="col-md-3">
			<div id="preview_2" class="img-thumbnail">
                    	<p style="text-align:center; margin:30px 0 0 0; font-size:12px; color:darkblue;">Please upload a recent<br> photo of<br> Father here <br> Size 25mm*30mm</p>
                    </div>
				<input type="file" name="thumb1" id="thumb1" required onchange="readURL(this,2);" class="form-control"/>
			</div>
			<!--	</td>
			<td>-->
			<div class="col-md-3">
			<div id="preview_3" class="img-thumbnail">
                    	<p style="text-align:center; margin:30px 0 0 0; font-size:12px; color:darkblue;">Please upload a recent<br> photo of<br> Mother here <br> Size 25mm*30mm</p>
                    </div>
				<input type="file" name="thumb2" id="thumb2" required onchange="readURL(this,3);" class="form-control"/>
			</div>
			<!--	</td>
			<td>-->
			<div class="col-md-3">
			<div id="preview_4" class="img-thumbnail">
                    	<p style="text-align:center; margin:30px 0 0 0; font-size:12px; color:darkblue;">Please upload a recent<br> photo of<br> Local Guardian<br>(if any) here <br> Size 25mm*30mm</p>
                    </div>
				
				<?php

				if( $loc_info['name']!=''){
				?>
				
				<input type="file" name="thumb3" id="thumb3" onchange="readURL(this,4);" class="form-control" required/>
				
				<?php
				}
else{
	?>
				<p style="text-align:center; margin:20px 0 0 0; font-size:12px; color:darkblue;">Local Gardian Data is empty.So photograph not required.</p>
				<!--<input type="file" name="thumb6" id="thumb6" onchange="readURL(this,7);" class="form-control"/>-->
				<?php
}
				
?>
			</div>
			<!--	</td>
			<td>
			</table>-->
		
		
		
       <br><br> 

       <!-- <table class="table_bor" style="background:#ECF4D0; margin:0 0 20px 0;" bordercolor=teal>-->
		<table class="table_bor" style="margin:0 0 20px 0; color:darkblue;" >
        	<tr>

            	<td align="center">Signature of Father</td>

                <td align="center">Signature of Mother</td>

                <td align="center">Signature of Local Guardian</td>

            </tr>
			
			<tr>

            	<td style="padding:0;" align="center">
            	     <div id="preview_5" style="width:257px; height:55px; margin:15px auto; padding:3px; border:1px solid #999;">

                    	<p style="text-align:center; margin:30px 0 0 0; font-size:12px;">&nbsp;</p>

                    </div><br />

                    <input type="file" name="thumb4" id="thumb4" required onchange="readURL(this,5);" />
                </td>
				
			<td style="padding:0;" align="center">
			     <div id="preview_6" style="width:257px; height:55px; margin:15px auto; padding:3px; border:1px solid #999;">

                    	<p style="text-align:center; margin:30px 0 0 0; font-size:12px;">&nbsp;</p>

                    </div><br />

                    <input type="file" name="thumb5" id="thumb5" required onchange="readURL(this,6);" /></td>

                <td style="padding:0;"align="center" >
                    <div id="preview_7" style="width:257px; height:55px; margin:15px auto; padding:0px; border:1px solid #999;">

                    	<p style="text-align:center; margin:30px 0 0 0; font-size:12px;">&nbsp;</p>

                    </div><br />
<?php

				if( $loc_info['name']!=''){
				?>
                    <input type="file" name="thumb6" id="thumb6" onchange="readURL(this,7);" required/></td>
				<?php
				}
else{
	?>
				<p style="text-align:center; margin:30px 0 0 0; font-size:12px; color:darkblue;" align="center">Local Gardian Data is empty</p>
				<!--<input type="file" name="thumb6" id="thumb6" onchange="readURL(this,7);" class="form-control"/>-->
				<?php
}
?>
			</tr>
		</table>
		<div class="row">
		<div class="col-md-4">
			<div id="preview_8" class="img-thumbnail">
            	<p style="text-align:center; margin:30px 0 0 0; font-size:12px; color:darkblue;">Please upload a <br />Birth Certificate of<br/> candidate(student) here <br /> Size 225mm*300mm</p>
            </div>
				<input type="file" name="thumb7" id="thumb7" required onchange="readURL(this,8);" class="form-control"/>
			</div>
			</div>
			
        <div class="next_btn" style="width:130px;">
            <input type="submit" id="print" value="SUBMIT TO SAVE & CONTINUE"/>
         <!--       <button type="button" id="edit" onclick="do_edit('<?php echo $stud_id;?>')">EDIT ERROR</button> 
            <button type="button" id="exit" onclick="do_exit()">Exit</button>-->
      <!--  <button onclick="submit_to_family()">Next Page</button>
        <input type="button" id="print" value="Submit" onclick="go_to_acknowledgement('<?php echo $stud_id;?>')" /> -->
       
    <!--  <button type="button" id="exit" onclick="do_exit()">Exit</button>-->
        </div>
        <div style="text-align:center; font-size:16px; color:#0000ff; margin:40px 0 0 0;">
        <i style="color:red;">** Click SUBMIT BUTTON once only to, save and upload photographs. Please wait till you are redirected to PAYMENT GATEWAY. **</i></div>
   <br>
    <center><i style="color:blue;"></i>** Agrasain Balika Siksha Sadan is an unaided linguistic minority institution. **</i></center>
    </div>
    
    </div>

    </form>

</body>

</html>

