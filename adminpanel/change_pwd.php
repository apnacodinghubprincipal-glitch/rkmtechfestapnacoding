<?php
require_once('connect.php');

if($_POST){

$select=mysql_query("select * from admin where id='".$_SESSION['id']."'");
$rs=mysql_fetch_array($select);

$db_pwd=$rs['pwd'];
$old_pwd=$_POST['old_pwd'];
$new_pwd=$_POST['new_pwd'];
$con_pwd=$_POST['con_pwd'];


if($db_pwd<>$old_pwd){
	echo "<script>alert('Old Password is not correct')</script>";
}
else if($new_pwd<>$con_pwd){
	echo "<script>alert('Please check confirm password')</script>";
}
else{
	$upd="update admin set pwd='".$new_pwd."' where id='".$_SESSION['id']."'";
	mysql_query($upd);
	echo "<script>alert('Password Updated')</script>";
}

}
?>


<form method="post" action="">
<table width="58%" height="179" border="1" class="table table-bordered">
  <tbody>
    <tr>
      <td colspan="2"><h3>Change Password</h3></td>
    </tr>
    <tr>
      <td width="32%">Old Password</td>
      <td width="68%"><input type="password" name="old_pwd" id="textfield"  class="form-control"></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><input type="password" name="new_pwd" id="textfield2"  class="form-control"></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input type="password" name="con_pwd" id="textfield3"  class="form-control"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>
  </tbody>
</table>
</form>
