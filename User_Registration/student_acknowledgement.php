<?php
include("connection.php");
  //NEW SERVER_2022
    session_start();
	error_reporting(1);
	

 echo $SutdentId=$_GET['std'];

//to collect the id after inserting the record
 $_SESSION['stud_id']=$_POST['stntid'];
 $stud_id=$_SESSION['stud_id'];

 $_SESSION['$stud_id']=$stud_id;

 //to select picture of student
if($_POST){
	
 $target_path = "student_image_master/";
$thumb=$_FILES['thumb']['name'];
$ext=pathinfo($thumb, PATHINFO_EXTENSION);
//if($ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG" || $ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF"|| $ext=="pdf"|| $ext=="docx"|| $ext=="xlsx"|| $ext=="txt" || $ext="doc" || $ext="xls")
	if($ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG" || $ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF")
  {
   $target_path = $target_path . basename($_FILES['thumb']['name']); 
   move_uploaded_file($_FILES['thumb']['tmp_name'], $target_path); 
  }

  	
  	//to select picture of student_certificate		
	$target_path = "student_image_master/";
    $thumb7=$_FILES['thumb7']['name'];
    $ext=pathinfo($thumb7, PATHINFO_EXTENSION);
    //if($ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG" || $ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF"|| $ext=="pdf"|| $ext=="docx"|| $ext=="xlsx"|| $ext=="txt" || $ext="doc" || $ext="xls")
    if($ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG" || $ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF")
{
   $target_path = $target_path . basename($_FILES['thumb7']['name']); 
   move_uploaded_file($_FILES['thumb7']['tmp_name'], $target_path); 
  }
  
    //to insert  student_id ,all images or picture of student, father, motherlocal_guardian, father_sign, mother_sign , local_guardian_sign and student_birth_certificate   nursery_student_image_master_2021_22
    $insert="insert student_image_master set 
    student_pic='".$thumb."',
    student_certificate='".$thumb7."',
    student_id='".$stud_id."'";

    mysqli_query($conn,$insert) or die(mysqli_error());
}

    $stu_info = "SELECT * FROM student_master WHERE reg_no = '$stud_id'";

      $stu_info = mysqli_query($conn,$stu_info);

	  $stud_info = mysqli_fetch_array($stu_info);
	  
    // to print the image
    $img_info = "SELECT * FROM student_image_master WHERE student_id = '$stud_id'";

     $img_query = mysqli_query($conn,$img_info);

	 $imgg_info = mysqli_fetch_array($img_query);
	 
/*mysqli_query($connect,"update student_master set status='1' where id='$SutdentId'");
mysqli_query($conn,"update student_master set status='1' where id='$stud_id'");
$getsession= "SELECT * FROM cms WHERE id ='13'";
$getsession = mysqli_query($conn,$getsession) or die(mysql_error());

$getsession = mysqli_fetch_array($getsession);
$Cursession=$getsession['cms_description'];*/

$StudentDetailsArr=mysqli_fetch_array(mysqli_query($conn,"select * from student_master where reg_no='$stud_id'"));

$RegNoArr=explode("/",$StudentDetailsArr['reg_no']);

//header('Location:view_form.php?');


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<script>

function print_page()
{
	var printButton = document.getElementById("printid");
	printButton.style.visibility = 'hidden';
	var srch = document.getElementById("editid");
	srch.style.visibility = 'hidden';
	var pagethree = document.getElementById("pagethree");
	pagethree.style.visibility = 'visible';
	window.print()
	printButton.style.visibility = 'visible';
	srch.style.visibility = 'visible';
	pagethree.style.visibility = 'hidden';
}
 
 function do_edit(i)
		 {
			 //alert("hgghg");
			
			window.open("student_details.php?StudentId=" + i ,"_self");
		 }
 function go_to_next(id)
 {
  //window.location.href="student_bank_statement.php?std=" +id;
  //window.location.href="view_form.php?std=" +id;
  window.location.href="logout.php";
  
 }
		 
 function go_to_prev()
 {
	 window.location.href="family_information.php";
	 document.frm.submit();
 }
</script>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Apna coding hub</title>

<link rel="stylesheet" type="text/css" href="css/main.css" />

<style>
body{ margin:0; padding:0; font-family:Arial, Helvetica, sans-serif; font-size:14px;}

.input_box{ width:200px; height:20px;}

.textarea_box{ width:99%; height:50px;}

.table_bor{border-collapse: collapse; width:100%;}

.table_bor tr td{ border:1px solid #CCC; padding:7px 7px;}

.next_btn{ width:100px; margin:20px auto;}

.previous_btn{ width:250px; margin:20px auto;}

.modal {

    display: none; /* Hidden by default */

    position: fixed; /* Stay in place */

    z-index: 1; /* Sit on top */

    left: 0;

    top: 0;

    width: 100%; /* Full width */

    height: 100%; /* Full height */

    overflow: auto; /* Enable scroll if needed */

    background-color: rgb(0,0,0); /* Fallback color */

    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

}

/* Modal Content */

.modal-content {

    background-color: #80cd33;

    margin: auto;

    padding: 20px;

    border: 1px solid #888;

    width: 70%;

}

/* The Close Button */

.close {

    color: #aaaaaa;

    float: right;

    font-size: 28px;

    font-weight: bold;

}

.close:hover,

.close:focus {

    color: #000;

    text-decoration: none;

    cursor: pointer;

}

.clear{ clear:both;}

p{ padding:0; margin:0;}

.acknowl{ width:900px; margin:0 auto; border:2px solid #666; padding:8px;}

.print_logo{ width:116px; height:88px; margin:5px 0 0 5px; float:left;}

.print_address{ width:450px; float:left; margin:0 0 0 60px; text-align:center;}

.print_photo{ width:150px; height:140px; float:left; margin:0 0 0 60px; border:1px solid #999;}

.bank_statement{ width:350px; border:1px dashed #000; padding:5px; float:left;}
	</style>

</head>

<body style="background:#80cd33;">

<!--<form name="frm" action="#" method="post" enctype="multipart/form-data">

<input type="hidden" name="h_student_id" value="<?php echo $StudentId; ?>" />-->

	<div style="width:1000px; background:#FFF; padding:30px; margin:0 auto;">
   	<div style="text-align: center;">
	  <div class="container">
            <div class="gt-top-bar default_width">
                <div class="gt-logo">
                    <img src="images/logo_new.jpg" style="margin:0 0 0px 0 auto;" alt="">
                </div>	
			</div>
		</div>
         <p id="pagethree" style="float:right; margin-top:50px; color:darkblue;"><b>Page 1 of 1</b></p>
         <br><br>
         <h4 style="text-align:center; margin:0 0 0 0px; color:darkblue;">ONLINE REGISTRATION CUM ACKNOWLEDGEMENT SLIP</h4>
        <h4 style="text-align:center; margin:0 0 0 0px; color:darkblue;"><i style="font-size:18px;">
            REGISTRATION FORM NO <?php echo $StudentDetailsArr['reg_no'];?> </i> (Note for enquiry purpose in future)</h4>
          
        <table class="table_bor" style="background:#ECF4D0; margin:0 0 10px 0;  color:darkblue;" bordercolor=teal>
                
               <tr style="background-color:#ccd7a4;">
                 <td style="text-align:right; width:30%;"><b>Website : </b></td>
                 <td style="text-align:left; width:30%;"><a href="https://www.apnacodinghubprincipal.com"></a>https://www.apnacodinghubprincipal.com</td>
                
                    <td rowspan="4" style="text-align:center; width:40%;">	
                        <img src="student_image_master/<?php echo $imgg_info['student_pic'];?>" 
                        alt="Please Paste a recent Photo of Student (Size 25mm*30mm)" height="140" width="100%"/>
		            </td>
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:30%;"><b>Registration ID : <i style="font-size:14px; color:#FF0000;"></i></b></td>
                   <td style="text-align:left; width:30%;"><?php echo $StudentDetailsArr['reg_no'];?> </td>
           
                </tr>
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:30%;"><b>Registered On : </b></td>
                    <td style="text-align:left; width:30%;"><?=$stud_info['reg_date']?></td>
                </tr>
                
               
                <tr style="font-size:16px;">
                    <td style="text-align:right; width:48%;"><b>Password <i style="font-size:14px;color:#FF0000;">(Note for enquiry purpose in future) :</i></b></td>
                    <td style="text-align:left; width:20%;"><?=$stud_info['pass_word']?></td>
              </tr>
            </table>
           
		
    	<table class="table_bor" style="background:#ECF4D0; margin:0 0 10px 0;  color:darkblue;" bordercolor=teal>

        	<tr style="background-color:#ccd7a4;">
            	<td colspan="4" style="font-size:18px;">Student's Information (Spelling as per Birth Certificate / Aadhar Card)</td>
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
        
        </table>

            <!-- to display image-->
             <h4>Please upload a Photo of your complain (Size 250kb*350kb)</h4>
             <table class="table_bor" style="background:#ECF4D0; margin:0 0 10px 0;  color:darkblue;" bordercolor=teal>
                
            <tr >
            <td rowspan="6" colspan="6" style="text-align:center; width:100%;">	
    		<img src="student_image_master/<?php echo $imgg_info['student_certificate'];?>" alt="Please upload a Photo of your complain (Size 250kb*350kb)" height="50%" width="80%"/> </p>
		    </td>
            </tr>
            <table>
            
            <p style="text-align:center;"><br> *** Please preserve this acknowledgement Slip for future reference.***</p>
        </div>

 	        <div class="previous_btn" style="text-align: center;"><!--<button onclick="go_to_prev()">Previous Page</button>--> 
			
			<button id="printid" onclick="print_page()">Print</button>
			<button id="editid" onclick="window.location.href='logout.php';">LOGOUT</button>
            
       <!--  <button id="editid" onclick="go_to_next(<?php echo $stud_id; ?>)">Next Page</button>
            <button type="button" onclick="do_edit('<?php echo $StudentId;?>')">Edit</button>-->
    	    </div>
        </div>
    </div>

    </div>

   <!--  </form> -->

</body>

</html>

