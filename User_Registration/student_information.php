<?php
include('connection.php');
  // SERVER_2026
    session_start();
	error_reporting(1);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>AGRASAIN BALIKA SIKSHA SADAN</title>

<link rel="stylesheet" type="text/css" href="css/main.css" />

 <!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>-->
<script src="js/jquery-1.11.0-jquery.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="source/jquery.datepick.css"> 
<script type="text/javascript" src="source/jquery.plugin.js"></script> 
<script type="text/javascript" src="source/jquery.datepick.js"></script>

<script>

function submit_to_family()

{
  document.frm.action="";

  document.frm.submit();
}

</script>


<script type="text/javascript" language="javascript">
function Validate()
{
	//alert("ggg");
	
	var x = document.frm.sms_phone_no.value;
        if(isNaN(x)|| x.indexOf(" ")!=-1){
              alert("Enter numeric value");
			  document.frm.sms_phone_no.focus();
			  document.getElementById("sms_phone_no").value="";
			  return false;
			  
			  }
        
}
function Validate1()
{
	var x = document.frm.sms_phone_no.value;
	if (x.length > 10 || x.length < 10 ){
                alert("Enter 10 digits in ph number"); 
				document.getElementById("sms_phone_no").value="";
				return false;
           }
        /*if (x.charAt(0)!="9" || x.charAt(0)!="2"){
                alert("it should start with 9 or 2 ");
                return false
           }*/
	
       
}

/*function Validate9()
{
	var x = document.frm.resodemce_phone_no.value;
	if(isNaN(x)|| x.indexOf(" ")!=-1){
              alert("Enter numeric value");
			  document.frm.resodemce_phone_no.focus();
			  document.getElementById("resodemce_phone_no").value="";
			  return false;
			  
			  }
       
}*/
function Validate8()
{
	var x = document.frm.resodemce_phone_no.value;
	if (x.length > 10 || x.length < 10 ){
                alert("enter landline or mobile phone number - 10 digits "); 
				document.getElementById("resodemce_phone_no").value="";
				return false;
           }
}

function Validate9()
{
    //if data type is text
	var x = document.frm.resodemce_phone_no.value;
	if(isNaN(x)|| x.indexOf(" ")!=-1){
              alert("Enter numeric value");
			  document.frm.resodemce_phone_no.focus();
			  document.getElementById("resodemce_phone_no").value="";
			  return false;
			  }
}
function Validate3()
{
	//alert("ggg");
	
	var x = document.frm.adhar_no.value;
        if(isNaN(x)|| x.indexOf(" ")!=-1){
              alert("Enter numeric value");
              return false; }
        
}
function Validate4()
{
	var x = document.frm.adhar_no.value;
	if (x.length > 12 || x.length < 12 ){
		       document.getElementById("adhar_no").value="";
                alert("enter 12 digits in adhaar number"); 
                return false;
           }
        /*if (x.charAt(0)!="9" || x.charAt(0)!="2"){
                alert("it should start with 9 or 2 ");
                return false
           }*/
	
       
}

 function isNumberKey(evt)
      {
		  
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
         return true;
      }

function isValid(dob)
{
	var res = dob.split("/");
	var d =res[0];
	var m =res[1];
	var y =res[2];
	
	var day="";
	if(m==1 || m==3 || m==5 || m==7 || m==8 || m==10 || m==12)
	{
	  var day="31";
	}
	if(m==2)
	{
	 var day="29";
	}
	if(m==4 || m==6 || m==9)
	{
	 var day="30";
	}
	
	
	
	if(m==1 && d <=day || m==2 && d <=day || m==3 && d <=day ||  m==4 && d <=day || m==5 && d <=day || m==6 && d <=day || m==7 && d <=day || m==8 && d <=day || m==9 && d <=day || m==10 && d <=day || m==11 && d <=day || m==12 && d <=day)
	{
	   //alert("ok");
	}
	else 
	{
  
	  alert("Enter Valid day");
	  document.getElementById("dob").value="";
	  return false;
	
	}
	
}

$(function() {
	$('#dob').datepick({ 
    onShow: $.datepick.monthOnly, showTrigger: '#calImg'});
	
	$('#prevNextFormatPicker').datepick({ 
    prevText: '< M', todayText: 'M yyyy', nextText: 'M >', 
    commandsAsDateFormat: true, showTrigger: '#calImg'});

});

</script>

</head>

<!--<body style="background:#80cd33;">-->
<body style="background:#99CC99;">
	<form name="frm" action="family_information.php" method="post" enctype="multipart/form-data" >
	

<?php
$sql_nur=mysqli_fetch_array(mysqli_query($connect,"select cms_description from cms where cms_title='For class NURSERY Date range'"));
$sql_lkg=mysqli_fetch_array(mysqli_query($connect,"select cms_description from cms where cms_title='For class L_KG Date range'"));
$sql_ukg=mysqli_fetch_array(mysqli_query($connect,"select cms_description from cms where cms_title='For class U_KG Date range'"));
$sql_cl_i=mysqli_fetch_array(mysqli_query($connect,"select cms_description from cms where cms_title='For class CLASS_I Date range'"));

$sql_class_nur=mysqli_fetch_array(mysqli_query($connect,"select class_name from class_master where id='1'"));
$sql_class_lkg=mysqli_fetch_array(mysqli_query($connect,"select class_name from class_master where id='2'"));
$sql_class_ukg=mysqli_fetch_array(mysqli_query($connect,"select class_name from class_master where id='3'"));
$sql_class_i=mysqli_fetch_array(mysqli_query($connect,"select class_name from class_master where id='4'"));
 ?>
 
 <input type="hidden" name="dt_nur" id="dt_nur" value="<?php echo $sql_nur['cms_description'];?>"/>
 <input type="hidden" name="dt_lkg" id="dt_lkg" value="<?php echo $sql_lkg['cms_description'];?>"/>
 <input type="hidden" name="dt_ukg" id="dt_ukg" value="<?php echo $sql_ukg['cms_description'];?>"/>
 <input type="hidden" name="dt_cl_i" id="dt_cl_i" value="<?php echo $sql_cl_i['cms_description'];?>"/>
 
 <input type="hidden" name="cl_nur" id="cl_nur" value="<?php echo $sql_class_nur['class_name'];?>"/>
 <input type="hidden" name="cl_kg" id="cl_lkg" value="<?php echo $sql_class_lkg['class_name'];?>"/>
 <input type="hidden" name="cl_ukg" id="cl_ukg" value="<?php echo $sql_class_ukg['class_name'];?>"/>
<input type="hidden" name="class_i" id="class_i" value="<?php echo $sql_class_i['class_name'];?>"/>

  <div style="width:1000px; background:#FFF; padding:30px; margin:0 auto;">	
    <?php /*include("header.php");*/ ?>
		
	<div class="container">
            <div class="gt-top-bar default_width">
                <div class="gt-logo">
                    <a href="#"><img src="images/logo_new.jpg" style="margin:0 0 20px 0 auto;"alt=""></a>
                </div>	
			</div>
		</div>
    <BR>
	
    	<table class="table_bor" style="background:#CDE9D6; margin:0 0 20px 0;" bordercolor=teal>
        <tr style="background-color:#ECF4D0;">	
		<td colspan="4" style="font-size:18px; color:darkblue;text-align:center;"><b>ONLINE REGISTRATION FORM </b>
		</td>
		</tr>
		<tr style="background-color:#ECF4D0;">
        <td colspan="4" style="text-align:left; font-size:18px; color:darkblue; text-align:center;"><b><i style="font-size:17px;">USER'S INFORMATION</i></b>
        </td>
        </tr>
        <tr style="background-color:#ECF4D0;">
        <td colspan="4" style="text-align:center; font-size:17px; color:red;"><b>NOTE: Name's spelling, Date of Birth must be entered as per Birth Certificate and ' * ' marked fields must be filled in.</i></b></td>
        </tr>
        
		 <tr style="font-size:18px;">

        	<td style="font-size:18px; color:darkblue;">Surname: <i style="color:red;"> *</i></td>
            <td style="font-size:18px; color:darkblue;"><input type="text" name="l_name" placeholder="Spelling As per Birth Certificate" value="<?php echo $_SESSION['studentsurname']; ?>" require class="input_box" required /></td>

            <td style="font-size:18px; color:darkblue;">First Name & Middle Name: <i style="color:red;"> *</i> </td>

            <td style="font-size:18px; color:darkblue;"><input type="text" name="f_name" placeholder="Spelling As per Birth Certificate" value="<?php echo $_SESSION['studentname']; ?>" class="input_box" required /></td>
        </tr>
 
            <tr style="font-size:18px;color:darkblue;">

             <td style="font-size:18px;">Blood Group.:<i style="color:red;"> *</i></td>

                <td><!--<input type="text" name="blood_group" value="<?php echo $_SESSION['bloodgroup'];?>" required class="input_box" />-->
                <select name="blood_group" id="blood_group" onclick="date_range();" onselect="date_range();" style="height:26px;" required class="input_box" value="<?php echo $_SESSION['bloodgroup'];?>" >
                <option value="">-- Please Select Blood Group --</option>
                <option value="O+"<?php if($_SESSION['bloodgroup']=="O+") { echo "selected";} ?>>O+</option>
                <option value="O-"<?php if($_SESSION['bloodgroup']=="O-") { echo "selected";} ?>>O-</option>
                <option value="A+"<?php if($_SESSION['bloodgroup']=="A+") { echo "selected";} ?>>A+</option>
                <option value="A-"<?php if($_SESSION['bloodgroup']=="A-") { echo "selected";} ?>>A-</option>
                <option value="B+"<?php if($_SESSION['bloodgroup']=="B+") { echo "selected";} ?>>B+</option>
                <option value="B-"<?php if($_SESSION['bloodgroup']=="B-") { echo "selected";} ?>>B-</option>
                <option value="AB+"<?php if($_SESSION['bloodgroup']=="AB+") { echo "selected";} ?>>AB+</option>
                <option value="AB-"<?php if($_SESSION['bloodgroup']=="AB-") { echo "selected";} ?>>AB-</option>
                </select>
                
                </td>
                <td style="font-size:18px;">Health Status:<i style="color:red;">*</i></td>

                <td style="font-size:18px;"><input type="text" name="health_status" placeholder="Medical Condition/ Problem, if any" onclick="date_range();" onselect="date_range();" value="<?php echo $_SESSION['healthstatus'];?>" class="input_box" required/></td>

            </tr>
			<tr>
        <td style="font-size:18px; color:darkblue;">Date of Birth: <i style="color:red;"> *</i></td>

        <td style="font-size:18px; color:darkblue;">
            <input type="text" name="dob" value="<?php echo $_SESSION['studentdob'];?>" required id="dob" class="input_box"  placeholder="dd/mm/yyyy" onchange="date_range();" data-datepick="showOtherMonths: true, firstDay: 1, dateFormat: 'd/m/yyyy', minDate: 'new Date(1982, 12 - 1, 25)'"/>
		</td>
		    <td style="font-size:18px; color:darkblue;">Aadhaar No. of student <br><i style="font-size:18px;">(If available): </i></td>

            <td style="font-size:18px;"><input maxlength="12" type="text" name="adhar_no" id="adhar_no" value="<?php echo $_SESSION['adharno'];?>" class="input_box" onkeypress="return isNumberKey(event)" onchange="Validate4();" /></td>
          
        </tr>
            <tr style="font-size:18px; color:darkblue;">
            	 
            <td>SMS Phone No<i style="font-size:16px;"><BR><i style="color:red;"> *</i></td>

            <td style="font-size:18px;"><input maxlength="10" type="text" name="sms_phone_no" id="sms_phone_no" placeholder="Enter 10 digits mobile number." value="<?php echo $_SESSION['smsphnumber'];?>"  class="input_box" required onkeypress="Validate();" onchange="Validate1();"/></td>
   
           	<td style="font-size:18px;">Residence Phone No.: <i style="color:red;"> *</i></td>

                <td style="font-size:18px;"><input type="text" name="resodemce_phone_no" id="resodemce_phone_no" onchange="Validate8();" onkeypress="Validate9();" value="<?php echo $_SESSION['residentphnumber'];?>" required class="input_box" /></td>

                
            </tr>
           
             <tr style="font-size:18px;color:darkblue;">

            	<td style="font-size:18px;">Present Address with <BR>Pin Code:<i style="color:red;"> *</i></td>

               <td colspan="3" style="font-size:18px; color:darkblue;"><textarea name="present_address" required onclick="date_range();" onselect="date_range();"  class="textarea_box"><?php echo $_SESSION['presentaddress'];?></textarea></td>
               
            </tr>
        
        </table>
       
        <div class="next_btn" >
            <!--<button onclick="submit_to_family()">Next Page</button>--> 
            <input type="submit" style="width:150%; height:36px; bordercolor=teal; color:darkblue; font-size:20px; text-align:center;" value="SUBMIT" />
        </div>
            
</div>

    </form>

</body>

</html>

