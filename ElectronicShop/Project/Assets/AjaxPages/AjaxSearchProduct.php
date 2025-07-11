<?php
session_start();
include("../Connection/Connection.php");

if($_GET['cid']!="" && $_GET['bid']=="")
{
?>
    <div class="container">
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_product p 
                   INNER JOIN tbl_brand b ON p.Brand_id = b.Brand_id 
                   INNER JOIN tbl_ecategory c ON p.category_id = c.category_id 
                   WHERE c.category_id = " . $_GET['cid'];
        $result = $con->query($selQry);
        while($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <div class="product-card">
                <img src="../Assets/Files/User/Photo/<?php echo $data['product_photo']; ?>" alt="<?php echo $data['product_name']; ?>">
                <div class="product-name"><?php echo $data["product_name"]; ?></div>
                <div class="product-brand"><?php echo $data["Brand_Name"]; ?></div>
                <div class="product-action">
                    <a href="ViewDetails.php?pid=<?php echo $data['product_id']; ?>" class="btn">View Details</a>
                    <?php
                    // Check stock availability
                    $stockQuery = "SELECT SUM(stock_quantity) AS stock FROM tbl_stock WHERE product_id = " . $data["product_id"];
                    $stockResult = $con->query($stockQuery);
                    $stockData = $stockResult->fetch_assoc();
                    $cartQuery = "SELECT SUM(cart_qty) AS cart_qty FROM tbl_cart WHERE product_id = " . $data["product_id"];
                    $cartResult = $con->query($cartQuery);
                    $cartData = $cartResult->fetch_assoc();
                    $availableStock = $stockData['stock'] - $cartData['cart_qty'];

                    if ($availableStock > 0) {
                    ?>
                        <a href="javascript:void(0)" onclick="addCart('<?php echo $data['product_id']; ?>')" class="btn btn-success btn-block text-white">Add to Cart</a>
                    <?php
                    } else if ($availableStock == 0) {
                    ?>
                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                    <?php
                    } else {
                    ?>
                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}

if($_GET['bid']!="" && $_GET['cid']=="")
{
?>
    <div class="container">
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_product p 
                   INNER JOIN tbl_brand b ON p.Brand_id = b.Brand_id 
                   INNER JOIN tbl_ecategory c ON p.category_id = c.category_id 
                   WHERE b.brand_id = " . $_GET['bid'];
        $result = $con->query($selQry);
        while($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <div class="product-card">
                <img src="../Assets/Files/User/Photo/<?php echo $data['product_photo']; ?>" alt="<?php echo $data['product_name']; ?>">
                <div class="product-name"><?php echo $data["product_name"]; ?></div>
                <div class="product-brand"><?php echo $data["Brand_Name"]; ?></div>
                <div class="product-action">
                    <a href="ViewDetails.php?pid=<?php echo $data['product_id']; ?>" class="btn">View Details</a>
                    <?php
                    // Check stock availability
                    $stockQuery = "SELECT SUM(stock_quantity) AS stock FROM tbl_stock WHERE product_id = " . $data["product_id"];
                    $stockResult = $con->query($stockQuery);
                    $stockData = $stockResult->fetch_assoc();
                    $cartQuery = "SELECT SUM(cart_qty) AS cart_qty FROM tbl_cart WHERE product_id = " . $data["product_id"];
                    $cartResult = $con->query($cartQuery);
                    $cartData = $cartResult->fetch_assoc();
                    $availableStock = $stockData['stock'] - $cartData['cart_qty'];

                    if ($availableStock > 0) {
                    ?>
                        <a href="javascript:void(0)" onclick="addCart('<?php echo $data['product_id']; ?>')" class="btn btn-success btn-block text-white">Add to Cart</a>
                    <?php
                    } else if ($availableStock == 0) {
                    ?>
                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                    <?php
                    } else {
                    ?>
                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}

if($_GET['bid']!="" && $_GET['cid']!="")
{
?>
    <div class="container">
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_product p 
                   INNER JOIN tbl_brand b ON p.Brand_id = b.Brand_id 
                   INNER JOIN tbl_ecategory c ON p.category_id = c.category_id 
                   WHERE b.brand_id = " . $_GET['bid'] . " AND c.category_id = " . $_GET['cid'];
        $result = $con->query($selQry);
        while($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <div class="product-card">
                <img width="200" src="../Assets/Files/User/Photo/<?php echo $data['product_photo']; ?>" alt="<?php echo $data['product_name']; ?>">
                <div class="product-name"><?php echo $data["product_name"]; ?></div>
                <div class="product-brand"><?php echo $data["Brand_Name"]; ?></div>
                <div class="product-action">
                    <a href="ViewDetails.php?pid=<?php echo $data['product_id']; ?>" class="btn">View Details</a>
                    <?php
                    // Check stock availability
                    $stockQuery = "SELECT SUM(stock_quantity) AS stock FROM tbl_stock WHERE product_id = " . $data["product_id"];
                    $stockResult = $con->query($stockQuery);
                    $stockData = $stockResult->fetch_assoc();
                    $cartQuery = "SELECT SUM(cart_qty) AS cart_qty FROM tbl_cart WHERE product_id = " . $data["product_id"];
                    $cartResult = $con->query($cartQuery);
                    $cartData = $cartResult->fetch_assoc();
                    $availableStock = $stockData['stock'] - $cartData['cart_qty'];

                    if ($availableStock > 0) {
                    ?>
                        <a href="javascript:void(0)" onclick="addCart('<?php echo $data['product_id']; ?>')" class="btn btn-success btn-block text-white">Add to Cart</a>
                    <?php
                    } else if ($availableStock == 0) {
                    ?>
                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                    <?php
                    } else {
                    ?>
                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
