<?php
include('connection.php');

date_default_timezone_set("Asia/Kolkata");
//echo $stud_id=$_SESSION['reg_no'];
 //$stud_id=$_GET['stntid'];

// $StudentId=$_GET['std'];

 $stud_id=$_GET['studentid'];
 $_SESSION['studentid']=$stud_id;

 
	  $stu_info = "SELECT * FROM student_master WHERE id = $stud_id";

      $stu_info = mysqli_query($conn,$stu_info);

	  $stud_info = mysqli_fetch_array($stu_info);

	  $img_info = "SELECT * FROM student_image_master WHERE student_id = $stud_id";

      $img_info = mysqli_query($conn,$img_info);

	  $imgg_info = mysqli_fetch_array($img_info);
	  session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>AGRASAIN BALIKA SIKSHA SADAN</title>

<link rel="stylesheet" type="text/css" href="css/main.css" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>

function go_to_next(id)
 {
  window.location.href="student_bank_statement.php?std=" +id;
  //window.location.href="view_form.php?std=" +id;
 }
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
 //window.location.href="finish.php";
}
function go_to_acknowledgement(i)
{
 window.open("student_acknowledgement.php?std=" + i ,"_self");
}

function print_page()
{
	var printButton = document.getElementById("printid");
	printButton.style.visibility = 'hidden';
	var exitButton = document.getElementById("exit");
	exitButton.style.visibility = 'hidden';
	$("#page1").show();
	$("#page2").show();
	window.print();
	printButton.style.visibility = 'visible';
	exitButton.style.visibility = 'visible';
	$("#page1").hide();
	$("#page2").hide();
}
function do_exit()
{
 //window.location.href="index.php";
//	window.location.href="finish.php";
	alert("THANK YOU !!!YOUR FORM IS SUCCESSFULLY SUBMITTED");
	window.location.href="index.php";
}

$(document).ready(function() {
	$("#dob").datepicker();
});
$(document).ready(function() {
	$("#page1").hide();
	$("#page2").hide();
});
</script>
</head>
<body style="background:#99CC99;">
<!--<form name="frm" action="#" method="post" enctype="multipart/form-data">-->

<!--<form name="frm" action="student_bank_statement.php" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $_SESSION['$StudentId']; ?>" name="stud_id">	-->

<form name="frm" action="student_photo_birth_certificate.php" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $_SESSION['studentid']; ?>" name="stud_id">
<div style="width:1000px; background:#FFF; padding:30px; margin:0 auto;">

	<!--<p id="page1" style="float:right; margin-top:25px;"><b>Page 1 of 3</b></p>
<span style="float:right;">Page 2 of 3</span>-->
    <?php include("header.php"); ?>
    
	<?php
	
 //     $tm = date("l, F d Y, H:i:s" );
		$tm1= date('l, d F Y',strtotime('3 weekdays'));
        $s_inf = mysqli_query($conn,"select id,session, reg_no, class, reg_date, sms_phone_no, pass_word from student_master where id = '$stud_id' ");
        while($s_info = mysqli_fetch_array($s_inf))
        {
			$fname = mysqli_fetch_array(mysqli_query($conn,"select email from father_information_master where student_id = '$stud_id' "));
			$app = mysqli_fetch_array(mysqli_query($connect,"select app_date from student_app_master where student_id = '$stud_id' "));
            $r_no = explode("_", $s_info['reg_no']);
			$ses = $s_info['session'];
			$cls = $s_info['class'];
			$dt = $app['app_date'];
    ?>
     <!--<h5 style="text-align:center;">ABSS IS AN UNAIDED LINGUISTIC MINORITY INSTITUTION</h5>-->
         <h3 style="text-align:center; font-size:20px; color:darkblue;"><b>ONLINE REGISTRATION FORM NO : <i style="font-size:22px;"> <?=$s_info['reg_no']?> </i>FOR <br>CLASS <i style="font-size:22px;"><?=$s_info['class']?> </i>SESSION <i style="font-size:20px;"><?=$s_info['session']?></i></b></h3>
    
<!--	 <h3 style="text-align:center;">ONLINE REGISTRATION FORM NO: <i style="font-size:22px;"> <?=$s_info['id']?> </i>FOR CLASS<i style="font-size:22px;"> <?=$s_info['class']?></i> SESSION <i style="font-size:22px;"><?=$s_info['session']?></i></h3>
            <h5 style="text-align:center;">NB: Please submit this form at school reception on or before <?=$app['app_date']?> between 9.00 A.M. to 12.00 Noon</h5>-->
	
		<!--  within 3 workingdays applicable for forms collected/dowdloated between 15th to 22nd October, 2019 
		<h3 style="text-align:center;">Please submit this form at school reception <font color="red">within 3 working days</font> </h3>-->
		
		<!-- - forms collected/dowdloated between 23rd, 24th and 25th October,2019 will submit the same by Thursday 31st October 2019 within 12.00 noon.--> 
	<!--	<h5 style="text-align:center;font-size:16px;">Advice: Parents downloading forms on <i style="font-size:22px;"> <i style="color:red;">23rd, 24th and 25th October,2019 </i></i>will please</h5>
	<h5 style="text-align:center;font-size:16px;">submit the form positively by<i style="font-size:22px;"> <i style="color:red;"> Thursday, 31st October, 2019 within 12.00 noon.</i></i></h5>   -->
	<!-- <h3 style="text-align:center;">Overwriting on the Admission Form is not allowed</h3>-->
    <!-- <p id="page1" style="float:right;"><b>Page 1 of 3</b></p>-->
     <h3 style="text-align:center;">NB: Please note the <font color="red">Registration number and password</font> for further Admission Process</h3>  
	
	<span style="float:right;">Page 1 of 2</span>
	
	<table class="table_bor" style="margin:0 0 10px 0; font-size:16px;">
               
                <tr>
                    <td style="text-align:right; width:48%;"><b>Website</b></td>
                    <td style="text-align:centre; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><a href="https://www.abssliluah.com"></a>https://www.abssliluah.com</td>
                </tr>
                <tr>
                    <td style="text-align:right; width:48%;"><b>Registration ID <i style="font-size:14px;"><font color="red">(for enquiry purpose by parents in future)</font></i></b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?php echo $s_info['reg_no']; ?></td>
                </tr>
                <tr>
                    <td style="text-align:right; width:48%;"><b>Registered On</b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$s_info['reg_date']?></td>
                </tr>
                <tr>
                    <td style="text-align:right; width:48%;"><b>E-mail ID <i style="font-size:12px;">(parents)</i></b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$fname['email']?></td>
                </tr>
                <tr>
                    <td style="text-align:right; width:48%;"><b>Mobile no. for SMS</b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$s_info['sms_phone_no']?></td>
                </tr>
                <tr>
                    <td style="text-align:right; width:48%;"><b>Password <i style="font-size:14px;"><font color="red">(for enquiry purpose by parents in future)</font></i></b></td>
                    <td style="text-align:center; width:2%;">::</td>
                    <td style="text-align:left; width:50%;"><?=$s_info['pass_word']?></td>
                </tr>
            </table>
            <?php
            }
            ?>
	
    	<table class="table_bor" style="margin-bottom:10px; font-size:16px;">

        	<tr>
            	<td colspan="4" style="font-size:18px;">Student's Information (Spelling as per Birth Certificate submitted)</td>
           </tr>

        	<tr>
              <td width="32%"><b>Surname:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['surname']?></td>

                <td width="32%"><b>First Name & Middle Name:</b> <i style="color:red;"> *</i> </td>

                <td><?=$stud_info['name']?></td>
            </tr>

            <tr>
            	<td><b>Class:</b> <i style="color:red;"> *</i></td>

                <td> <?=$stud_info['class']?></td>

                <td><b>Date of Birth:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['dob']?></td>
            </tr>

        <!--    <tr>
            	<td><b>Nationality:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['nationality']?></td>

                <td><b>Religion:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['religion']?></td>
            </tr>-->

            <tr>
            	<td><b>Caste(Pl. submit Certificate):</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['caste']?></td>

                <td><b>Mother Tongue:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['mother_tounge']?></td>
            </tr>

            <tr>
            	<td><b>Birth Place(Dist. & State):</b><i style="color:red;"> *</i></td>

                <td><?=$stud_info['birth_place']?></td>

                <td><b>Home Locality:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['home_locality']?></td>
            </tr>

            <tr>
            	<td><b>Mode of Transportation to ABSS:<i style="color:red;"> *</i></b></td>

                <td><?=$stud_info['mode_of_transporation']?></td>

                <td><b>Health Status:</b></td>

                <td><?=$stud_info['health_status']?></td>
            </tr>

            <tr>
            	<td><b>Nearest Railway Station:</b></td>

                <td><?=$stud_info['nearest_rail_station']?></td>
                
                 <td><b>Head of Family:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['head_of_family']?></td>
           </tr>
            
            <tr>
            	<td><b>Blood Group.:<i style="color:red;"> *</i></b></td>
                <td><?=$stud_info['blood_group']?></td>
                
                <td><b>Aadhaar No.:</b></td>
                <td><?=$stud_info['adhar_no']?></td>
            </tr>

            <tr>
              <td><b>Residence Phone No.:</b> <i style="color:red;"> *</i></td>

                <td><?=$stud_info['resident_ph_no']?></td>
                
                <td><b>Mobile no. for SMS:<i style="color:red;"> *</i></b></td>
                
                <td><?=$stud_info['sms_phone_no']?></td>
             </tr>

        <!--    <tr>
            	<td><b>Previous Class:</b></td>

                <td><?=$stud_info['prev_class']?></td>
                
                 <td><b>Previous School:</b></td>

                <td><?=$stud_info['prev_shool']?></td>
            </tr>
            <tr>
            	<td><b>Permanent Mark of Identification:</b></td>

                <td><?=$stud_info['parmanent_mark_indentification']?></td>

                <td><b>Name, Class & ID No. of Sister/s Reading in ABSS:</b></td>

                <td><?=$stud_info['name_class_id_of_sister']?></td>
            </tr>-->
            
            <tr>
            	<td><b>Present Address:<i style="color:red;"> *</i></b></td>

                <td colspan="3"> <?=$stud_info['present_address']?></td>
            </tr>
          <!--  <tr>
            	<td><b>Why Choosing ABSS for Studies:</b></td>

                <td colspan="3"><?=$stud_info['why_choose_abss']?></td>
          </tr>-->

        </table>
        
<!--
        <br> <br> <br> <br><br> <br><br> <br> <br><br><br>

      <!--<p id="page2" style="float:right; margin-top:25px; "><b>Page 2 of 3</b></p> -->
      
<!--	 <h4 style="text-align:center;">ONLINE REGISTRATION FORM NO: <i style="font-size:20px;"><?=$$r_no?></i>FOR CLASS <i style="font-size:20px;"> <?=$cls?> </i> SESSION <i style="font-size:20px;"> <?=$ses?></i> </h4>
-->    
     <!-- <h5 style="text-align:center;">NB: Please submit this form at school reception on or before <?=$dt?> between 9.00 A.M. to 12.00 Noon</h5>
<h5 style="text-align:center;font-size:16px; ">NB: Please submit this form at school reception within <font color="red">3 working days</font> between 9.00 A.M. to 12.00 Noon</h5>-->
		
	<!-- - forms collected/downloaded between 23rd, 24th and 25th October,2019 will submit the same by Thursday 31st October 2019 within 12.00 noon. -->
	<!--	<h4 style="text-align:center;" >NB:Parents downloading forms on <font color="red">23rd, 24th and 25th Oct. 2019 </font>will pl. submit the form positively by <font color="red">Thursday, 31st Oct. 2019 within 12.00 noon.</font></h4>-->
	
	<!--<h5 style="text-align:center;font-size:16px;">NB: Parents downloading forms on <i style="font-size:22px;"> <i style="color:red;">11th & 12th Oct. 2018 </i></i>will</h5>
	<h5 style="text-align:center;font-size:16px;"><i style="font-size:22px;"> <i style="color:red;">submit the form positively by Saturday. 13th Oct.2018 within 11.00 a.m. </i></i></h5>-->
	<!--
<h5 style="text-align:center;font-size:16px;">NB: Parents downloading forms on 11th & 12th Oct. 2018 will submit the form positively by <font color="red">Saturday, 13th Oct.2018 within 11.00 a.m. </font></h5>
    <p id="page2" style="float:right;"><b>Page 2 of 3</b></p>
	
	<h4 style="text-align:center;">Overwriting on the Admission Form is not allowed</h4>
	<span style="float:right;">Page 2 of 3</span>-->
         
	<table class="table_bor" style="margin:0 0 10px 0; font-size:17px;">
        	<tr>
            	<td colspan="4" style="font-size:16px;">Father's Information (Spelling as per Birth Certificate submitted)</td>
            </tr>

        	<tr>
            	<td width="25%"><b>Name:<i style="color:red;"> *</i></b></td>

                <td><?=$fath_info['name']?></td>

                <td width="25%"><b>Qualification:<i style="color:red;"> *</i></b></td>

               <td><?=$fath_info['qualification']?></td>
            </tr>

            <tr>
            	<td><b>Profession/Post Held:<i style="color:red;"> *</i></b></td>

                <td><?=$fath_info['profesion']?></td>

                <td><b>Office Address:<i style="color:red;"> *</i></b></td>

                <td><?=$fath_info['full_address']?></td>
            </tr>

            <tr>
           		<td><b>Name of Organization:</b><i style="color:red;"> *</i></td>

                <td><?=$fath_info['fa_company_name']?></td>


                <td><b>Monthly Income:<i style="color:red;"> *</i></b></td>

                <td>₹ <?=$fath_info['monthly_incom']?></td>
            </tr>

            <tr>
            	<td><b>Email:</b></td>

                <td><?=$fath_info['email']?></td>
                
                <td><b>Phone No.:<i style="color:red;"> *</i></b></td>

                <td><?=$fath_info['ph_no']?></td>
            </tr>

        </table>

        <table class="table_bor" style="margin:0 0 10px 0; font-size:16px;">

        	<tr>
            	<td colspan="4" style="font-size:18px;">Mother's Information (Spelling as per Birth Certificate submitted)</td>
            </tr>

        	<tr>
            	<td width="25%"><b>Name:<i style="color:red;"> *</i></b></td>

                <td><?=$moth_info['name']?></td>

                <td width="25%"><b>Qualification:<i style="color:red;"> *</i></b></td>

                <td><?=$moth_info['qualification']?></td>
            </tr>

            <tr>
            	<td><b>Profession/Post Held: <i style="color:red;"> *</i></b></td>

                <td><?=$moth_info['profesion']?></td>

                <td><b>Office Address:(if working)</b></td>

                <td><?=$moth_info['full_address']?></td>
            </tr>

            <tr>
         
               	<td><b>Name of Organization:</b></td>
                <td><?=$moth_info['ma_company_name']?></td>

                <td><b>Monthly Income:</b></td>

                <td>₹ <?=$moth_info['monthly_incom']?></td>

            <tr>
            	<td><b>Email:</b></td>

                <td><?=$moth_info['email']?></td>

               	<td><b>Phone No.:<i style="color:red;"> *</i></b></td>

                <td><?=$moth_info['ph_no']?></td>
            </tr>

        </table>

        

        <table class="table_bor" style="margin:0 0 10px 0; font-size:16px;">

        	<tr>

            	<td colspan="4" style="font-size:18px;">Local Guardian's Information</td>

            </tr>

        	<tr>

            	<td width="25%"><b>Name:</b></td>

                <td><?=$loc_info['name']?></td>

                <td width="25%"><b>Qualification:</b></td>

                <td><?=$loc_info['qualification']?></td>

            </tr>

            <tr>

            	<td><b>Profession/Post Held:</b></td>

                <td><?=$loc_info['profesion']?></td>

                <td><b>Residential Address:</b></td>

                <td><?=$loc_info['full_address']?></td>

            </tr>

            <tr>

            	<td><b>Phone No.:</b></td>

                <td><?=$loc_info['ph_no']?></td>

                <td><b>Monthly Income:</b></td>

                <td>₹ <?=$loc_info['monthly_incom']?></td>

            </tr>

            <tr>

            	<td><b>Email:</b></td>

                <td><?=$loc_info['email']?></td>

                <td><b>Relation (With Student)</b></td>

                <td> <?=$loc_info['relation']?></td>

            </tr>

        </table>

     <!--   <table class="table_bor" style="margin:0 0 20px 0; font-size:17px;">

        	<tr>
            	<td colspan="6" style="font-size:18px;">Student's Information</td>
           </tr>

        	<tr>
            	<td width="15%"><b>Surname:</b> <i style="color:red;"> *</i></td>

                <td width="18%"><?php echo $stud_info['surname']?></td>

                <td width="15%"><b>Name:</b> <i style="color:red;"> *</i> </td>

                <td width="18%"><?php echo $stud_info['name']?></td>
 				
                <td width="19%"><b>Registration ID</b></td>
                  
                <td width="15%"><?php echo $stud_info['reg_no']; ?></td>
            </tr>
             
        </table>
		

       <table class="table_bor" bordercolor=black>
        	<tr>
                <td align="center">Student</td>
            	<td align="center">Father</td>

                <td align="center">Mother</td>

                <td align="center">Local Guardian</td>

            </tr>
        	<tr>

            	<td height="191">

                	<div id="preview_1" style="width:150px; height:120px; margin:0 auto; padding:3px; border:1px solid #999;">
                   
	<p style="text-align:center; margin:0px 0 0 0; font-size:12px;">
	<img src="nursery_student_pic_2021_22/<?php echo $imgg_info['student_pic'];?>" alt="Please paste a recent<br /> photo of<br /> candidate(student) here Size 25mm*30mm" height="150" width="100%"/></p>
                    </div><br />                   

                </td>

                <td>

                	<div id="preview_2" style="width:150px; height:120px; margin:0 auto; border:1px solid #999;">
                   
	<p style="text-align:center; margin:0px 0 0 0; font-size:12px;">
	<img src="nursery_father_pic_2021_22/<?php echo $imgg_info['father_pic'];?>" alt="Please Paste a recent Photo of Father (Size 25mm*30mm)" height="150" width="100%"/></p>
                    </div><br />

                </td>

                <td>

                	<div id="preview_3" style="width:150px; height:120px; margin:0 auto; border:1px solid #999;">

    <p style="text-align:center; margin:0px 0 0 0; font-size:12px;">
	<img src="nursery_mother_pic_2021_22/<?php echo $imgg_info['mother_pic'];?>" alt="Please Paste a recent Photo of Mother (Size 25mm*30mm)" height="150" width="100%"/></p>
                    </div><br />

                </td>

                <td>

                	<div id="preview_4" style="width:150px; height:120px; margin:0 auto; border:1px solid #999;">
                   
    <p style="text-align:center; margin:0px 0 0 0; font-size:12px;">
	<img src="nursery_local_guardian_pic_2021_22/<?php echo $imgg_info['local_guardian_pic'];?>" alt="Please Paste a recent Photo of Local Guardian(Size 25mm*30mm)" height="150" width="100%"/></p>
                    </div><br />

                </td>
            </tr>
        </table>

       

        <table class="table_bor" style="margin:20px 0 0 0" bordercolor=black>

        	<tr>

            	<td align="center">Signature of Father</td>

                <td align="center">Signature of Mother</td>

                <td align="center">Signature of Local Guardian</td>

            </tr>

            <tr>

            	<td height="59" style="padding:0;" align="center"><br />
				<img src="nursery_father_sign_2021_22/<?php echo $imgg_info['father_sign'];?>" alt="Please Paste Sign of Father(Size 25mm*30mm)" height="40" width="190px"/></td>
				
                <td style="padding:0;" align="center"><br />
				<img src="nursery_mother_sign_2021_22/<?php echo $imgg_info['mother_sign'];?>" alt="Please Paste Sign of Mother(Size 25mm*30mm)" height="40" width="190px"/>	</td>

                <td style="padding:0;" align="center"><br />
				<img src="nursery_local_guardian_sign_2021_22/<?php echo $imgg_info['local_guardian_sign'];?>" alt="Please Paste Sign of Local Guardian(Size 25mm*30mm)" height="40" width="190px"/></td>
            </tr>

        </table>-->
        
        <!--<p id="page2" style="float:right; margin-top:250px;"><b>Page 2 of 4</b></p>-->
        <div class="next_btn" style="width:130px;"><!--<button onclick="submit_to_family()">Next Page</button>
        <button id="printid" onclick="print_page()">Print</button>--> 
        <button id="printid" onclick="window.print();">Print</button>
        
        <input type="submit" id="print" value="Next Page"/> 
       <!--new link <button type="button" id="online_payment"> <a href="https://securetest.sabpaisa.in/SabPaisaClientTest/payLink?clientCode=NITE5"># ONLINE PAYMENT</a></button>-->
         <!--old link   <a href="http://services.sabpaisa.in/pages/AgrasainBalikaSikshaSadan.html#ChildVerticalTab_12"># ONLINE PAYMENT</a></button>-->
   
       
     <!--old link <button type="button" id="exit" onclick="do_exit()">Exit</button> -->
        <!-- <button type="button" id="exit" onclick="do_exit()">Finish</button>-->
        <!--</div>
<div style="text-align:center; font-size:14px; color:#0000ff; margin:40px 0 0 0;">** Agrasain Balika Siksha Sadan is an unaided linguistic minority institution. **</div>
  -->  </div>

    </form>

</body>

</html>

