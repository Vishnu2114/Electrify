<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FeedBack</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table border="1">

    <?php
  $i=0;
  $selQry="select * from tbl_feedback p inner join tbl_feedback d where d.feedback_id= p.feedback_id ";
  $result=$con->query($selQry);
  while($data=$result->fetch_assoc())
  {
    $i++;
    ?>
    
    
  <tr>
    <th>Content</th>
    <td><?php echo $data["feedback_cont"] ?></td>
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