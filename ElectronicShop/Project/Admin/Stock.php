<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$qty=$_POST["txt_quality"];
    $insQry = "insert into tbl_stock (stock_quantity,product_id,stock_date)values ('".$qty."','".$_GET["pid"]."',curdate())";
	if($con -> query($insQry))
    {
  
      /*echo "Inserted";*/
  
    }
}
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <th>Quantity</th>
      <td><label for="txt_quality"></label>
      <input type="text" required name="txt_quality" id="txt_quality" /></td>
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