<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_catagory"];
    $insQry = "insert into tbl_ecategory(category_name)values('$name')";
	
	if($con -> query($insQry))
    {
      /*echo "Inserted";*/
    }

}

	
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_ecategory where category_id=".$_GET["did"];
	if($con->query($delQry))
	{
		?>
		<script>
		alert("deleted");
		window.location="ECatogory.php";
		</script>
        <?php
	}
}
?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <th>Catogory</th>
      <td><label for="txt_catagory"></label>
      <input type="text" required name="txt_catagory" id="txt_catagory" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center">
    <table align="center" border="1">
      <tr>
        <th>Si.No.</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
      <tr>
         <?php
  $i=0;
  $selQry="select * from tbl_ecategory";
  $result=$con->query($selQry);
  while($data=$result->fetch_assoc())
  {
	  $i++;
  ?>
  
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["category_name"]?></td>
    <td> <a href="ECatogory.php?did=<?php echo $data["category_id"];?>">delete</a></td>
  </tr>
  <?php
  }
  ?>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
include("Foot.php");
?>