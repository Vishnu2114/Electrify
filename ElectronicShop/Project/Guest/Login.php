<?php
session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");

if (isset($_POST["btn_login"])) 
{
    $email = $_POST["txt_email"];
    $password = $_POST["txt_pass"];

    $selAdmin = "SELECT * FROM tbl_eadmin WHERE admin_email='$email' AND admin_Pass='$password'";
    $resultAdmin = $con->query($selAdmin);

    if ($dataAdmin = $resultAdmin->fetch_assoc()) 
    {
        $_SESSION["aid"] = $dataAdmin["admin_Id"];
        header("location:../Admin/HomePage.php");
        exit;
    }

    $selUser = "SELECT * FROM tbl_user WHERE user_email='$email' AND user_password='$password'";
    $resultUser = $con->query($selUser);

    if ($dataUser = $resultUser->fetch_assoc()) 
    {
        $_SESSION["uid"] = $dataUser["user_id"];
        header("location:../User/HomePage.php");
        exit;
    }
    else  
    {
        ?>
		<script>
		alert("Invalid email or password. Please check your login information and ensure your email is correctly formatted. If you have forgotten your password, you can reset it.");
		window.location="Login.php";
		</script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Traders - Login</title>
    <style>
        .form-container 
        {
            margin-top: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form 
        {
            background-color: #333;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            width: 350px;
        }
        input[type="email"], input[type="password"] 
        {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            background-color: #555;
            color: #fff;
            border: 1px solid #777;
            border-radius: 4px;
        }
        input[type="submit"] 
        {
            background-color: #fff;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .register-link 
        {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body style="background-image:url('../Assets/Template/Main/images/maya-maceka-yW-Qgw_IJXg-unsplash.jpg'); background-size: cover; ">
    <div class="form-container">
        <form method="post">
            <table>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="txt_email" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="txt_pass" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_login" value="Login">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="register-link">
                        <a href="User.php">New User? Register Here</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
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

<?php include("Foot.php"); ?>
