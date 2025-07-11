<?php
session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Product</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(255, 255, 255);
            color: #f0f0f0;
        }
        .container-m {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .product-card {
            background-color: #333;
            border-radius: 10px;
            margin: 10px;
            padding: 20px;
            width: 200px;
            text-align: center;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-name {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-brand {
            color: #bbb;
        }
        .btn {
            background-color: #ff6666;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-disabled {
            background-color: #aaa;
            cursor: not-allowed;
        }
        .btn:hover {
            background-color: #ff4444;
        }
        .search-table {
            width:98%;
            border-collapse: collapse;
            margin: 10px 0;
            font-family: Arial, sans-serif;
        }

        .search-table th, .search-table td {
            padding: 10px 12px;
            border-radius: 8px;
            text-align: center;
        }

        .search-table th {
            background-color:rgb(255, 255, 255);
            color: #333;
            font-weight: bold;
            border-bottom: 2px solid #333;
        }

        .search-table td {
            border-bottom: 1px solid #111;
        }

        .dropdown {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid rgba(0, 0, 0, 0.39);
            align: center;
            border-radius: 4px;
            font-size: 14px;
        }

        .search-table-container-m {
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
            background-color:rgba(0, 0, 0, 0.81);
        }
    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table>
<h1><a href="Mycart.php?cid=<?php echo $_GET['cid'] ?>">Go cart</a><h1>
<input type="hidden" id="cidValue" value="<?php echo $_GET['cid']?>" />
  <tr>
    <th><label for="btn_category"></label>
      <select name="btn_category" required id="btn_category" onchange="getProduct()">
      <option value="">Select</option>
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
      </select></th>
    <th><label for="btn_brand"></label>
      <select name="btn_brand" required id="btn_brand" onchange="getProduct()">
      <option value="">Select</option>
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
      </select></th>
  </tr>
</table>


<p>&nbsp;</p>
<div id="Search">

    <div class="container-m">
        <?php
        $selQry = "SELECT * FROM tbl_product p INNER JOIN tbl_brand b ON p.Brand_id = b.Brand_id";
        $result = $con->query($selQry);
        while ($data = $result->fetch_assoc()) {
            ?>
            <div class="product-card">
                <img src="../Assets/Files/User/Photo/<?php echo $data['product_photo'] ?>" alt="<?php echo $data['product_name'] ?>">
                <div class="product-name"><?php echo $data["product_name"]; ?></div>
                <div class="product-brand"><?php echo $data["Brand_Name"]; ?></div>

                

                <a href="ViewDetailsProduct.php?pid=<?php echo $data['product_id']; ?>" class="btn">View Details</a>
                <div >
                <?php
                                           
                                           $stock = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" . $data["product_id"] . "'";
                       $result2 =$con->query($stock);
                                    $row2=$result2->fetch_assoc();
 
 
                                            $stocka = "select sum(cart_qty) as stock from tbl_cart where product_id = '" . $data["product_id"] . "'";
                                            $result2a = $con->query($stocka);
                                           $row2a=$result2a->fetch_assoc();
 
                                           $stock = $row2["stock"] - $row2a["stock"];
                       if ($stock > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $data['product_id'] ?>')"  class="btn btn-success btn-block text-white">Add to Cart</a>
                                        <?php
                                        } else if ($stock== 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-disabled">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-disabled">Out of Stock</a>
                                        <?php
                                            }
                                        ?>
                                        </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</form>
<p>&nbsp;</p>
</body>


 <script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getProduct(did)
  {
	  var cid = document.getElementById('btn_category').value;
	  var bid = document.getElementById('btn_brand').value;
	  
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSearchProduct.php?cid=" + cid + "&bid="+ bid ,
      success: function (result) 
	  {

        $("#Search").html(result);
      }
    });
  }
  
  
    function addCart(id)
            {
					  var mid = document.getElementById('cidValue').value;

                $.ajax({
                    url: "../Assets/AjaxPages/AjaxCustomerAddCart.php?id=" + id +"&mid="+mid,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }
</script>

</html>
<?php
include("Foot.php");
?>