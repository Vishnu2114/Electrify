<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
if(isset($_GET['pid'])){
  $updQry="UPDATE tbl_purchase set purchase_status='".$_GET['st']."' where purchase_id=".$_GET['pid'];
  if($con->query($updQry)){
    ?>
    <script>
      alert("Updated")
      window.location="ViewReport.php"
    </script>
    <?php
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
      <th>User Id</th>
      <th>Name </th>
      <th>Email</th>
      <th>Product Id</th>
      <th>Product Discound</th>
      <th>Purchace Amound</th>
      <th>Purchase Status</th>
      <th>Purchase Date</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    <tr>
  <?php
  $i=0;
  $selQry="select * from tbl_purchase p inner join tbl_user d on d.user_id= p.user_id where purchase_status>=2";
  $result=$con->query($selQry);
  while($data=$result->fetch_assoc())
  {
    $i++;
  ?>
    
    
  <tr>
    <td><?php echo $data["user_id"] ?></td>
    <td><?php echo $data["user_name"] ?></td>
    <td><?php echo $data["user_email"] ?></td>
    <td><?php echo $data["purchase_id"] ?></td>
    <td><?php echo $data["purchase_disount"] ?></td>
    <td><?php echo $data["purchase_amount"] ?></td>
    <td><?php echo $data["purchase_status"] ?></td>
    <td><?php echo $data["purchase_date"] ?></td>
    <td>
      <?php
      if($data['purchase_status']==2){
        echo "Order Placed";
      }
      else if($data['purchase_status']==3){
        echo "Item Packed";
      }
      else if($data['purchase_status']==4){
        echo "Item Shipped";
      }
      else if($data['purchase_status']==5){
        echo "Item Out for Delivery";
      }
      else if($data['purchase_status']==6){
        echo "Delivery Completed";
      }
      ?>
    </td>
    <td>
      <a  class="text-light  btn btn-primary" href ="ViewDetails.php?pid=<?php echo $data["purchase_id"];?>">View More</a>
      <?php
      if($data['purchase_status']==2){
      ?>
      <br><br><a  class="text-light  btn btn-success" href ="ViewReport.php?pid=<?php echo $data["purchase_id"];?>&st=3">Packed</a>
      <?php
  }
  else if($data['purchase_status']==3){
    ?>
      <br><br><a  class="text-light  btn btn-success" href ="ViewReport.php?pid=<?php echo $data["purchase_id"];?>&st=4">Shipped</a>
    
    <?php
  }
  else if($data['purchase_status']==4){
    ?>
      <br><br><a  class="text-light  btn btn-success" href ="ViewReport.php?pid=<?php echo $data["purchase_id"];?>&st=5">Out For Delivery</a>
    <?php
  }
  ?>
  
  </td>
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