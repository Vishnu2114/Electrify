<?php
include('../Assets/Connection/Connection.php');
include("Head.php");

// Get product_id from the URL
$product_id = $_GET['pid'];

// Fetch product details from the database
$selQry = "SELECT p.*, b.Brand_Name, c.category_Name FROM tbl_product p 
           INNER JOIN tbl_brand b ON p.Brand_id = b.Brand_id 
           INNER JOIN tbl_ecategory c ON p.category_id = c.category_id 
           WHERE p.product_id = '$product_id'";

$result = $con->query($selQry);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['product_name']; ?> - Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            color: #333;
        }

        .product-details-container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .product-header h1 {
            font-size: 2em;
            color: #333;
        }

        .product-header .category-brand {
            color: #888;
            font-size: 1.1em;
        }

        .product-details {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-image {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .product-info {
            flex: 1;
            max-width: 600px;
        }

        .product-price {
            font-size: 1.5em;
            color: #ff6666;
            margin-top: 20px;
        }

        .product-description {
            margin-top: 20px;
            line-height: 1.6;
        }

        .btn {
            background-color: #ff6666;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.1em;
        }

        .btn:hover {
            background-color: #ff4444;
        }

        .stock-status {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="product-details-container">
        <div class="product-header">
            <h1><?php echo $product['product_name']; ?></h1>
            <p class="category-brand">Category: <?php echo $product['category_Name']; ?> | Brand: <?php echo $product['Brand_Name']; ?></p>
        </div>

        <div class="product-details">
            <img src="../Assets/Files/User/Photo/<?php echo $product['product_photo']; ?>" alt="<?php echo $product['product_name']; ?>" class="product-image">

            <div class="product-info">
                <p class="product-price"><?php echo $product['product_price']; ?></p>
                <p class="product-description"><?php echo $product['product_details']; ?></p>

                <!-- Check stock availability -->
                <?php
                $stock_query = "SELECT SUM(stock_quantity) AS stock FROM tbl_stock WHERE product_id = '" . $product['product_id'] . "'";
                $stock_result = $con->query($stock_query);
                $stock_data = $stock_result->fetch_assoc();
                $stock_left = $stock_data['stock'];
                ?>
                <div class="stock-status">
                    <?php
                    if ($stock_left > 0) {
                        echo "<span style='color: green;'>In Stock: $stock_left items</span>";
                    } 
                    else {
                        echo "<span style='color: red;'>Out of Stock</span>";
                    }
                    ?>
                </div>

                <!-- Add to Cart button -->
                <?php if ($stock_left > 0) { ?>
                    <a href="javascript:void(0);" onclick="addToCart(<?php echo $product['product_id']; ?>)" class="btn">Add to Cart</a>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function addToCart(productId) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxAddCart.php",
                type: "GET",
                data: { id: productId },
                success: function(response) {
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
    </script>
</body>
</html>

<?php
include("Foot.php");
?>
