<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
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
      <th>Si.no.</th>
      <th>Product Name</th>
      <th>Photo</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
    <tr>
  <?php
  $i=0;
  $selQry="select * from tbl_cart c inner join tbl_product p on c.product_id= p.product_id where purchase_id =".$_GET['pid'];
  $result=$con->query($selQry);
  while($data=$result->fetch_assoc())
  {
    $i++;
  ?>
    
    
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["product_name"] ?></td>
    <td><img src="../Assets/Files/user/Photo/<?php echo $data["product_photo"] ?>" width="200" /></td>
    <td><?php echo $data["cart_qty"] ?></td>
    <td><?php echo $data["product_price"] ?></td>
  </tr>
  <?php
  }
  ?>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>