<?php

include('../Assets/Connection/Connection.php');
include("Head.php");
if(isset($_POST["btn_add"]))
{
  $name = $_POST['txt_place'];
  $district = $_POST['btn_district'];
  $insQry = "insert into tbl_place(place_name,district_id)values('$name','$district')";
    if($con -> query($insQry))
	{
        /* echo "inserted";*/
    }
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_place where place_id=".$_GET["did"];
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
<title>Place</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <th>District</th>
      <th><label for="btn_district"></label>
       
          <select name="btn_district" required id="btn_district">
          <option>.....select....</option>
          <?php
      $selQryOne="select * from tbl_district";
      $resultone=$con->query($selQryOne);
      while($data=$resultone->fetch_assoc())
      {
        ?>
              <option value="<?php echo $data["District_id"] ?>" > <?php echo $data["District_name"] ?></option>
              <?php
      }
      ?>
      
          </select>
     </th>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" required name="txt_place" id="txt_place" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_add" id="btn_add" value="Add" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1" align="center">
    <tr>
      <td>SiNo</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
     
    </tr>
    <?php
  $i=0;
  $selQry="select * from tbl_place p inner join tbl_district d where d.district_id = p.district_id";
  $result=$con->query($selQry);
  while($data=$result->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["District_name"] ?></td>
       <td><?php echo $data["place_name"] ?></td>
       <td> <a href="Place.php?did=<?php echo $data["place_id"];?>">delete</a></td>
     
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