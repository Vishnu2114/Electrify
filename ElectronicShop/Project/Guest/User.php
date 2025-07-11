<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txt_email"];
    $password = $_POST["txt_pass"];
    $district = $_POST["btn_district"];
    $place = $_POST["btn_place"];

    $insQry = "INSERT INTO tbl_user (user_name, user_email, user_password, place_id) VALUES ('$name', '$email', '$password', '$place')";
    $con->query($insQry);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Traders - User Registration</title>
    <style>
        .form-container {
            margin-top: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            background-color: #333;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            width: 350px;
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            background-color: #555;
            color: #fff;
            border: 1px solid #777;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #fff;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body style="background-image:url('../Assets/Template/Main/images/signin-bg.jpg'); background-size: cover;">
    <div class="form-container">
        <form method="post">
            <table>
                <tr>
                    <th>Name</th>
                    <td><input required type="text" name="txt_name" pattern="^[A-Z]+[a-zA-Z ]*$" title="Name should start with a capital letter and contain only alphabets and spaces."></td>
                </tr>
                <tr>
                    <th>District</th>
                    <td>
                        <select name="btn_district" required onchange="getPlace(this.value)">
                            <option value="">Select District</option>
                            <?php
                            $result = $con->query("SELECT * FROM tbl_district");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row["District_id"]}'>{$row["District_name"]}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Place</th>
                    <td>
                        <select name="btn_place" required id="btn_place">
                            <option value="">Select Place</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="txt_email" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="txt_pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, one lowercase letter, and at least 8 or more characters"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_submit" value="Register">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function(result) {
                    $("#btn_place").html(result);
                }
            });
        }
    </script>
</body>
</html>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>

<?php include("Foot.php"); ?>
