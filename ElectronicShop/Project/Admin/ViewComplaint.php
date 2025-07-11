<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
if(isset($_POST["btn_submit"]))
{
  $title = $_POST['txt_title'];
  $content = $_POST['txt_content'];
  $insQry = "insert into tbl_complaint(complaint_title,complaint_content)values('$title','$content')";
  if($con -> query($insQry)){
  /*echo "inserted";*/
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
      <th>Sl no</th>
      <th>Title</th>
      <th>Content</th>
      <th>Reply</th>
    </tr>
     <?php
 $i=0;
 $selQry="select*from tbl_complaint";
 $result=$con->query($selQry);
 while($data=$result->fetch_assoc())
 {
  $i++;
  ?>
        
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["complaint_title"] ?></td>
       <td><?php echo $data["complaint_content"] ?></td>
       <td><a href="Reply.php?did=<?php echo $data["complaint_id"];?>">Give Replay</a> </td>
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