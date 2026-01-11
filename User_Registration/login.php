<?php
session_start();
error_reporting(1);
//require_once('connection.php');
include('connection.php');

if($_POST){
	$select=mysqli_query($conn,"select * from admin where user='".$_POST['user']."' and pwd='".$_POST['pwd']."'");
	$total=mysqli_num_rows($select);
	$rs=mysqli_fetch_array($select);
	
	if($total!=''){
		$_SESSION['id']=$rs['id'];
		header("Location:index.php");
	}
	else{
		$msg="User and password Incorrect";
	}
}
?>
<style>
.container{
	width:50% !important;
	margin-top:30px;
}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

<div class="container">
<form method="post" action="">
<table width="51%" height="185" border="1" align="center" class="table table-bordered">
  <tbody>
  
    <tr>
      <td colspan="2"><strong>Admin Login</strong></td>
    </tr>
    <tr>
      <td>User</td>
      <td><input type="text" name="user" id="user"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="pwd" id="pwd"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Login"></td>
    </tr>
      
  <?php
  if($msg!=''){
  ?>
  <tr>
  <td colspan="2" style="color:#D93234; font-weight:bold; font-size:13px; font-family:tahoma;"><?php echo $msg;?></td>
  </tr>
  <?php
  }
  ?>

  </tbody>
</table>
</form>
</div>



