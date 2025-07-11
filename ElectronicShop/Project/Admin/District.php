<?php 
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
 $name = $_POST["txt_distname"];
 
 
 $selQry="select * from tbl_district where District_name = '$name'";
 $resultone=$con->query($selQry);
 if( $dataOne = $resultone->fetch_assoc() )
 { 
  
      ?>
      <script>
	  alert("The District is already Added");
	  </script>
      <?php
 
 }
 else
 {
      $insQry = "insert into tbl_district(District_name)values('$name')";
      if($con -> query($insQry))
      {
  
          /* echo "Inserted";*/
  
      }
 }
} 	
	
if(isset($_GET["did"]))
{
	$delQry="delete from  tbl_district where District_id=".$_GET["did"];
	if($con->query($delQry))
	{
		?>
		<script>
		alert("deleted");
		window.location="District.php";
		</script>
        <?php
	}
}
?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center">
    <tr>
      <th >District name</th>
      <td width="246"><label for="txt_distname"></label>
      <input type="text" required name="txt_distname" id="txt_distname" /></td>
    </tr>
    <tr>
      <th height="79" colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Clear" /></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table border="1" align="center">
    <tr>
      <th>SiNo.</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_district";
	$result=$con->query($selQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data["District_name"]?></td>
      <td><a href="District.php?did=<?php echo $data["District_id"];?>"> delete</a></td>
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