<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(0, 0, 0, 0.7);
            color: #f0f0f0;
        }
        .container {
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
        .btn:hover {
            background-color: #ff4444;
        }
        .btn-disabled {
            background-color: #aaa;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $selQry = "SELECT * FROM tbl_product p INNER JOIN tbl_brand b ON p.Brand_id = b.Brand_id";
        $result = $con->query($selQry);
        while ($data = $result->fetch_assoc()) {

            // Check stock availability
            $stock = "SELECT SUM(stock_quantity) AS stock FROM tbl_stock WHERE product_id = '" . $data["product_id"] . "'";
            $result2 = $con->query($stock);
            $row2 = $result2->fetch_assoc();
            $total_stock = $row2["stock"];

            // Check if the product is already in the cart
            $stock_in_cart = "SELECT SUM(cart_qty) AS stock_in_cart FROM tbl_cart WHERE product_id = '" . $data["product_id"] . "'";
            $result2a = $con->query($stock_in_cart);
            $row2a = $result2a->fetch_assoc();
            $stock_in_cart = $row2a["stock_in_cart"];

            $stock_left = $total_stock - $stock_in_cart;
            ?>

            <div class="product-card">
                <img src="../Assets/Files/User/Photo/<?php echo $data['product_photo'] ?>" alt="<?php echo $data['product_name'] ?>">
                <div class="product-name"><?php echo $data["product_name"]; ?></div>
                <div class="product-brand"><?php echo $data["Brand_Name"]; ?></div>

                <a href="ViewDetailsProduct.php?pid=<?php echo $data['product_id']; ?>" class="btn">View Details</a>

                <?php
                if ($stock_left > 0) {
                    // Stock available, show "Add to Cart" button
                    echo '<a href="javascript:void(0);" class="btn" onclick="addCart(' . $data['product_id'] . ')">Add to Cart</a>';
                } elseif ($stock_left == 0) {
                    // No stock left
                    echo '<a href="javascript:void(0);" class="btn btn-disabled">Out of Stock</a>';
                } else {
                    // Stock not found
                    echo '<a href="javascript:void(0);" class="btn btn-disabled">Out of Stock</a>';
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>

    <script src="../Assets/JQ/jQuery.js"></script>
    <!-- <script>
        function addCart(product_id) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxAddCart.php", // Use the same PHP file for adding to the cart
                type: "GET",
                data: { id: product_id }, // Send product ID to add to the cart
                success: function(response) {
                    // Show a success message or perform actions based on response
                    if (response.trim() === "Added to Cart") {
                        alert("Product added to cart!");
                    } else if (response.trim() === "Already Added to Cart") {
                        alert("This product is already in your cart.");
                    } else {
                        alert("Failed to add product to cart.");
                    }
                },
                error: function() {
                    alert("Error adding product to cart.");
                }
            });
        }
    </script> -->
</body>
</html>

<?php
include("Foot.php");
?>
