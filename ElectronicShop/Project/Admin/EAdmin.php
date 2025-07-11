<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
    $email=$_POST["txt_mail"];	
	$password=$_POST["txt_pass"];
	$details=$_POST["txt_details"];
	
	$photo=$_FILES["btn_photo"]["name"];
	$tempphoto=$_FILES["btn_photo"]["tmp_name"];
	move_uploaded_file($tempphoto,"../Assets/Files/user/Photo/".$photo);
	
	$insQry= "insert into tbl_eadmin(admin_name,admin_email,admin_pass,admin_details,admin_photo)value('".$name."','".$email."','".$password."','".$details."','".$photo."')";
	
	
	
	if($con -> query($insQry))
    {
  
     /* echo "Inserted";*/
  
    }
}
?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center" border="1">
    <tr>
      <th>Name</th>
      <td><label for="txt_name"></label>
      <input type="text" required name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><label for="txt_mail"></label>
      <input type="email" required name="txt_mail" id="txt_mail" /></td>
    </tr>
    <tr>
      <th>Password</th>
      <td><label for="txt_pass"></label>
      <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass" id="txt_pass" /></td>
    </tr>
    <tr>
      <th>Photo</th>
      <td><label for="btn_photo"></label>
      <input type="file" required name="btn_photo" id="btn_photo" /></td>
    </tr>
    <tr>
      <th>Details</th>
      <td><label for="txt_details"></label>
      <input type="text" required name="txt_details" id="txt_details" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>