<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
    $details=$_POST["txt_details"];
	
	$brand=$_POST["btn_brand"];
	
	$price=$_POST["txt_price"];
	
	$category=$_POST["btn_category"];
	
	$photo=$_FILES["btn_photo"]["name"];
	$tempphoto=$_FILES["btn_photo"]["tmp_name"];
	move_uploaded_file($tempphoto,"../Assets/Files/user/Photo/".$photo);
	
	$insQry= "insert into tbl_product(product_name,product_details,product_photo,Brand_id,category_id,product_price)value('".$name."','".$details."','".$photo."','".$brand."','".$category."','".$price."')";
	
	
	
	if($con -> query($insQry))
    {
     /* echo "Inserted";*/
    }
	
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_product where product_id=".$_GET["did"];
	if($con->query($delQry))
	{
		?>
		<script>
		alert("deleted");
		window.location="Product.php";
		</script>
        <?php
	}
	
	
	$delQry="delete from tbl_stock where product_id=".$_GET["did"];
	if($con->query($delQry))
	{
		?>
		<script>
		alert("deleted");
		window.location="Product.php";
		</script>
        <?php
	}
	
	
	
	$delQry="delete from tbl_cart where product_id=".$_GET["did"];
	if($con->query($delQry))
	{
		?>
		<script>
		alert("deleted");
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
<title>Product</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center" border="1">
    <tr>
      <th>Name</th>
      <td><label for="txt_name"></label>
      <input type="text" required name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <th>Photo</th>
      <td><label for="btn_photo"></label>
      <input type="file" required name="btn_photo" id="btn_photo" /></td>
    </tr>
    <tr>
      <th>Details</th>
      <td><label for="txt_details"></label>
      <input type="text" required name="txt_details" id="txt_details" /></td>
    </tr>
    <tr>
      <th>Brand</th>
      <td><label for="btn_brand"></label>
       
          <select name="btn_brand" required id="btn_brand" >
          <option>.....select....</option>
          <?php
      $selQryOneT="select * from tbl_brand";
      $resultoneT=$con->query($selQryOneT);
      while($dataOneT=$resultoneT->fetch_assoc())
      {
        ?>
              <option value="<?php echo $dataOneT["Brand_id"];?>" > <?php echo $dataOneT["Brand_Name"];?></option>
      <?php
        }
      ?>
      
          </select>
      </td>
    </tr>
    <tr>
      <th>Price</th>
      <td><label for="txt_price"></label>
      <input type="text" required name="txt_price" id="txt_price" /></td>
    </tr>
    <tr>
    <th>Category</th>
    <td><label for="btn_category"></label>
      <select name="btn_category" id="btn_category">
      <option>.....select....</option>
      <?php
      $selQryOneT="select * from tbl_ecategory";
      $resultoneT=$con->query($selQryOneT);
      while($dataOneT=$resultoneT->fetch_assoc())
      {
      ?>
              <option value="<?php echo $dataOneT["category_id"];?>" > <?php echo $dataOneT["category_name"];?></option>
      <?php
        }
      ?>
      </select></td>
    </tr>
    <tr>
      <th colspan="2"><div align="center">
        <input type="submit" required  name="btn_submit" id="btn_submit" value="Submit" />
      </div></th>
    </tr>
    
  </table>
  <p>&nbsp;</p>
  <p><b><u><i><h2 align="center">PRODUCT'S</h2></i></u></b></p>
  <p>&nbsp;</p>
  <table align="center" border="1">
    <tr>
      <th>Si.No.</th>
      <th>Name</th>
      <th>Photo</th>
      <th>Brand</th>
      <th>Price</th>
      <th>Action</th>
      <th>Stock</th>
      <th>Total Stock</th>
      <th>Add Stock</th>
    </tr>
    <tr>
    
<?php
 $i=0;
 $selQry="select * from tbl_product p inner join  tbl_brand b on p.Brand_id = b.Brand_id ";
 $result=$con->query($selQry);
 while($data=$result->fetch_assoc())
 {
  $i++;
  ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data["product_name"] ?></td>
      <td><img src="../Assets/Files/User/Photo/<?php echo $data['product_photo']?>" width="200"</td>
      <td><?php echo $data["Brand_Name"] ?></td>
      <td><a href="Price.php?did=<?php echo $data["product_id"];?>">enter price</a></td>
      <td><a href="Product.php?did=<?php echo $data["product_id"];?>">delete</a></td>
      <td>

      <?php
                                           
                                           $stock = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" . $data["product_id"] . "'";
                       $result2 =$con->query($stock);
                                    $row2=$result2->fetch_assoc();
 
 
                                            $stocka = "select sum(cart_qty) as stock from tbl_cart where product_id = '" . $data["product_id"] . "'";
                                            $result2a = $con->query($stocka);
                                           $row2a=$result2a->fetch_assoc();
 
                                           $stock = $row2["stock"] - $row2a["stock"];
                       echo $stock;
                                        ?>
      </td>
      <td>

<?php
                                     
                                     $stock = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" . $data["product_id"] . "'";
                 $result2 =$con->query($stock);
                              $row2=$result2->fetch_assoc();



                                   
                 echo $row2["stock"];
                                  ?>
</td>
      <td><a href ="Stock.php?pid=<?php echo $data["product_id"];?>">stock</a></td>
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