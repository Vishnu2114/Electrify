<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$replay=$_POST["txt_replay"];
	
	$upQry="update tbl_complaint set complaint_replay='$replay' where complaint_id=".$_GET['did'];
	$con->query($upQry);
	if($con -> query($upQry))
    {
      ?>
      <script>
        alert("Replied");
        window.location="ViewComplaint.php";
      </script>
     <?php
    }
}
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Replay</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <th>Reply</th>
      <td><label for="txt_replay"></label>
      <input type="text" name="txt_replay" id="txt_replay" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" required name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <!-- <p align="center"><a href="ViewComplaint.php">Complaint</a></p> -->
</form>
</body>
</html>
<?php
include("Foot.php");
?>