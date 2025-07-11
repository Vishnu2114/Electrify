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
    <tr align="center">
      <th>User Id</th>
      <th>Product Id</th>
      <th>Purchace Amount</th>
      <th>Purchase Status</th>
      <th>Purchase Date</th>
      <th>Purchase Time</th>
      <th>Action</th>
    </tr>
    <tr>
  <?php
  $i=0;
  $selQry="select * from tbl_purchase p inner join tbl_customer d on d.customer_id= p.customer_id ";
  $result=$con->query($selQry);
  while($data=$result->fetch_assoc())
  {
    $i++;
  ?>
    
    
  <tr align="center">
    <td><?php echo $data["customer_name"] ?></td>
    <td><?php echo $data["purchase_id"] ?></td>
    <td><?php echo $data["purchase_amount"] ?></td>
    <td><?php echo $data["purchase_status"] ?></td>
    <td><?php echo $data["purchase_date"] ?></td>
    <td><?php echo $data["purchase_time"] ?></td>
    <td><a href ="ViewDetails.php?pid=<?php echo $data["purchase_id"];?>">action</a></td>
  </tr>
  <?php
  }
  ?>
  </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
include("Foot.php");
?>