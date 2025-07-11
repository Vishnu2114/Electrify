<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
        
        body {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            font-family: "HelveticaNeue-Light", Helvetica, Arial, sans-serif;
        }
        h1 {
            color: white;
        }
        .shopping-cart, .product, .totals {
            margin-top: 20px;
        }
        .product {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product img {
            width: 100px;
        }
        .product-image {
    text-align: center;
        }

        

        .product-details {
            padding-left: 10px;
            padding-right: 10px;
            font-family: Arial, sans-serif;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .product-description {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
            margin-top: 5px;
        }

        .product-price {
            text-align: center;
            font-size: 16px;
            color: #28a745;
            font-weight: bold;
        }

        .product-quantity {
            text-align: center;
        }

        .product-quantity input {
            width: 50px;
            padding: 5px;
            font-size: 16px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .product-removal {
            text-align: center;
        }

        .product-removal button {
            padding: 8px 16px;
            background-color: #e74c3c; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .product-removal button:hover {
            background-color: #c0392b; 
        }

        .product-line-price {
            text-align: center;
            font-size: 16px;
            color: #333;
            font-weight: bold;
        }

        .checkout {
            background-color: #6b6;
            color: white;
            font-size: 20px;
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .checkout:hover {
            background-color: #494;
        }

    </style>
    </head>
    <?php
        if (isset($_POST["btn_checkout"])) {        
                 $amt = $_POST["carttotalamt"];
				$selC = "select * from tbl_purchase where user_id='" .$_SESSION["uid"]. "'and purchase_status='0'";
                $rs = $con->query($selC);
                $row=$rs->fetch_assoc();
                $upQry1 = "update tbl_purchase set purchase_date=curdate(),purchase_amount='".$amt."',purchase_status='1' where purchase_id='" .$row["purchase_id"]. "'";
                if($con->query($upQry1))
                {
					$upQry1s = "update tbl_cart set cart_status='1' where purchase_id='" .$row["purchase_id"]. "'";
					if($con->query($upQry1s))
					{
					  $_SESSION["bid"] = $row["purchase_id"];
					  ?>
					  <script>
						 window.location="Payment.php";
					  </script>
					  <?php
					}    
                }
			}
	?>
   <body onload="recalculateCart()" style="background-color:rgba(255, 255, 255, 0.7)";>
   <h1 style="color:white">Cart</h1>
<form method="post">
    <table class="shopping-cart" style="width: 100%; margin-top: 50px;">
            <!-- <tr>
                <th style="text-align:center; width: 15%;">Image</th>
                <th style="text-align:center; width: 16%;">Details</th>
                <th style="text-align:center; width: 10%;">Price</th>
                <th style="text-align:center; width: 10%;">Qty</th>
                <th style="text-align:center; width: 10%;">Remove</th>
                <th style="text-align:center; width: 16%;">Total</th>
            </tr> -->
            <?php
            $sel = "select * from tbl_purchase b inner join tbl_cart c on c.purchase_id=b.purchase_id where b.user_id='" .$_SESSION["uid"]. "' and purchase_status='0'";
            $res = $con->query($sel);
            while ($row=$res->fetch_assoc()) {
                $selPr = "select * from tbl_product where product_id ='" .$row["product_id"]. "'";
                $respr = $con->query($selPr);
                if ($rowpr=$respr->fetch_assoc()) {
                    $selstock = "select sum(stock_quantity) as stock from tbl_stock where product_id='".$rowpr["product_id"]."'";
                    $resst = $con->query($selstock);

                    if ($rowst=$resst->fetch_assoc()) {
                        $selstocka = "select sum(cart_qty) as stock from tbl_cart where product_id='".$rowpr["product_id"]."' and cart_status >0";
                        $ressta = $con->query($selstocka);
                        $rowsta=$ressta->fetch_assoc();

                        $stock = $rowst["stock"] - $rowsta["stock"];
            ?>
            <tr class="product">
                <td class="product-image">
                    <img src="../Assets/Files/User/Photo/<?php echo $rowpr["product_photo"] ?>" alt="Product Image"/>
                </td>
                <td class="product-details">
                    <div class="product-title"><?php echo $rowpr["product_name"] ?></div>
                    <p class="product-description"><?php echo $rowpr["product_details"] ?></p>
                </td>
                <td class="product-price"><?php echo $rowpr["product_price"] ?></td>
                <td class="product-quantity">
                    <input alt="<?php echo $row["cart_id"] ?>" type="number" value="<?php echo $row["cart_qty"] ?>" min="1" max="<?php echo $stock ?>"/>
                </td>
                <td class="product-removal">
                    <button class="remove-product" value="<?php echo $row["cart_id"] ?>">Remove</button>
                </td>
                <td class="product-line-price">
                    <?php
                        $pr = $rowpr["product_price"];
                        $qty = $row["cart_qty"];
                        $tot = (int)$pr * (int)$qty;
                        echo $tot;
                    ?>
                </td>
            </tr>
            <?php
                    }
                }
            }
            ?>
    </table>

    <div class="totals">
        <div class="totals-item totals-item-total">
            <label>Grand Total</label>
            <div class="totals-value" id="cart-total">0</div>
            <input type="hidden" required id="cart-totalamt" name="carttotalamt" value=""/>
        </div>
    </div>
    <button type="submit" required class="checkout" name="btn_checkout">Checkout</button>
</form>

        <script src="../Assets/JQ/jQuery.js"></script>
        <script>

        var fadeTime = 300;

        $(".product-quantity input").change(function() {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Update&id=" + this.alt + "&qty=" + this.value
            });
            updateQuantity(this);
        });
        $(".product-removal button").click(function() {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Delete&id=" + this.value
            });
            removeItem(this);
        });

        function recalculateCart() {
            var subtotal = 0;

            $(".product").each(function() {
                subtotal += parseFloat(
                        $(this).children(".product-line-price").text()
                        );
            });

            var total = subtotal;

            $(".totals-value").fadeOut(fadeTime, function() {
                $("#cart-total").html(total.toFixed(2));
                document.getElementById("cart-totalamt").value = total.toFixed(2);
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }

        function updateQuantity(quantityInput) {

            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;

            productRow.children(".product-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }

        function removeItem(removeButton) {

            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });
        }
        $('.switch2 input').on('change', function() {
            var dad = $(this).parent();
            if ($(this).is(':checked'))
                dad.addClass('switch2-checked');
            else
                dad.removeClass('switch2-checked');
        });
        </script>
        <p>&nbsp;</p>
    </body>
</html>

<?php include("Foot.php"); ?>
