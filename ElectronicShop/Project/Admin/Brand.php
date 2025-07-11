<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
    $insQry = "insert into tbl_brand(Brand_Name)values('$name')";
	
	if($con -> query($insQry))
    {
  
      /*echo "Inserted";*/
  
    }
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_brand where brand_id=".$_GET["did"];
	if($con->query($delQry))
	{
		?>
		<script>
		alert("deleted");
		window.location="Brand.php";
		</script>
        <?php
	}
}
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Brand</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center">
    <tr>
      <td >Brand Name</td>
      <td><label for="txt_name"></label>
      <input type="text" required name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_reset" id="btn_reset" value="Clear" />
      </div></td>
  </table>
  <p>&nbsp;</p>
  <table border="1" order="1" align="center">
    <tr>
      <th>SiNo.</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
    <?php
    $i=0;
    $selQry="select * from tbl_brand";
    $result=$con->query($selQry);
    while($data=$result->fetch_assoc())
    {
		$i++;
    ?>
  
    <tr>
       <td><?php echo $i;?></td>
       <td><?php echo $data["Brand_Name"]?></td>
       <td><a href="Brand.php?did=<?php echo $data["Brand_id"];?>"> delete</a></td>
    </tr>
    <?php
     }
    ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
include("Foot.php");
?>