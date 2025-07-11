<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

if(isset($_POST["btn_submit"]))
{
	$cpass = $_POST["txt_pass"];
	$npass = $_POST["txt_newpass"];
	$cnpass = $_POST["txt_conpass"];
	
	$selQry = "SELECT * FROM tbl_user WHERE user_id = ".$_SESSION["uid"];
    $result = $con->query($selQry);
    $data = $result->fetch_assoc();
	
	if($data["user_password"] == $cpass)
	{
		if($npass == $cnpass)
		{
			$uppQry = "UPDATE tbl_user SET user_password = '$npass' WHERE user_id = ".$_SESSION['uid'];
            echo "<script>alert('✔️ Password updated'); window.location='MyProfile.php';</script>";
	        $con->query($uppQry);
		}
        else
        {
            echo "<script>alert('⚠️ New password and confirm password does not match ⚠️ Please cheak again.'); window.location='ChangePassword.php';</script>";
        }
	}
    else
    {
        echo "<script>alert('⚠️ Current password does not match ⚠️Please cheak again.'); window.location='ChangePassword.php';</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <style>
        body 
    {
        background-image: url('../Assets/Template/Main/images/feedback.jpg');
        background-size: cover;
        font-family: Arial, sans-serif;
        color: #f0f0f0;
    }
    .form-container 
    {
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        margin: 40px auto;
        padding: 20px;
    }
    .form-container h2 
    {
        text-align: center;
    }
    table {
        width: 100%;
        color: #f0f0f0;
        margin: 0 auto;
    }
    table, th, td 
    {
        padding: 8px;
        text-align: center;
    }
    input[type="password"] 
    {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    input[type="submit"] 
    {
        width: 100%;
        padding: 10px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover 
    {
        background-color: #444;
    }
        
    </style>
</head>
<body>
    <div class="form-container">
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td style="color: white">Current Password</td>
                    <td><input type="password" required name="txt_pass" id="txt_pass" /></td>
                </tr>
                <tr>
                    <td style="color: white">New Password</td>
                    <td><input type="password" required name="txt_newpass" id="txt_newpass" /></td>
                </tr>
                <tr>
                    <td style="color: white">Confirm Password</td>
                    <td><input type="password" required name="txt_conpass" id="txt_conpass" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div align="center">
                            <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
s
<?php include("Foot.php"); ?>
