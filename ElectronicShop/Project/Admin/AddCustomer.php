<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_customer"];
    $insQry = "insert into tbl_customer(customer_name)values('$name')";
	
	if($con -> query($insQry))
    {
        $customer_id = $con->insert_id;
      ;
		?>
        <script>
		window.location="searchproduct.php?cid=<?php echo  $customer_id ?>";
		</script>
        <?php

       
    }

}


?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Purchase</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" >
  <table border="1" align="center">
    <tr>
      <th>Customer</th>
      <td><label for="txt_customer"></label>
      <input type="text" required name="txt_customer" id="txt_customer" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p> 
</form>
</body>
</html>
<?php
include("Foot.php");
?>