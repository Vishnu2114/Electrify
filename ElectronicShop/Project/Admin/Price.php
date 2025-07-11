<?php
session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
$selQry="select * from tbl_product where product_id = ".$_GET["did"];
$result=$con->query($selQry);
$data=$result->fetch_assoc();
if(isset($_POST["btn_submit"]))
{
	$price=$_POST["txt_price"];
    $upQry="update tbl_product set puduct_price = '$price' where product_id=".$_GET['did'];

	
	if($con -> query($upQry))
    {
  ?>
  <script>
    window.location="Product.php";
    </script>
  <?php
  
    }
}
?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Price</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <th>Enter the price</th>
      <th><label for="txt_price"></label>
      <input type="text" required name="txt_price" id="txt_price" value="<?php echo $data ["puduct_price"]?>"/></th>
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