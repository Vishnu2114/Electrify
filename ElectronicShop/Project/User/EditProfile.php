<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

$selQry = "SELECT * FROM tbl_user u INNER JOIN tbl_place p ON u.place_id = p.place_id INNER JOIN tbl_district d ON d.District_id = p.District_id WHERE user_id = " . $_SESSION["uid"];
$result = $con->query($selQry);
$data = $result->fetch_assoc();

if (isset($_POST["btn_submit"])) 
{
    $name = $_POST["txt_name"];
    $email = $_POST["txt_email"];
    $district = $_POST["btn_district"];
    $place = $_POST["btn_place"];

    $upQry = "UPDATE tbl_user SET user_name = '$name', user_email = '$email', place_id = '$place' WHERE user_id = " . $_SESSION['uid'];
    if ($con->query($upQry)) {
        echo "<script>alert('Updated'); window.location='MyProfile.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <style>
        body 
        {
            background-color: rgba(0, 0, 0, 0.7);
            color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .form-container 
        {
            background-color: #333;
            margin-top: 120px;
            justify-content: center;
            align-items: center;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            width: 350px;
        }
        input[type="text"], input[type="email"], select 
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
            width: 100%;
        }
    </style>
</head>
<body style="background-image:url('../Assets/Template/Main/images/editprofile-bg.jpg'); background-size: cover; ">
    <div class="form-container">
        <form method="post">
            <table>
                <tr>
                    <th>Name</th>
                    <td><input type="text" required name="txt_name" id="txt_name" value="<?php echo $data["user_name"]; ?>"/></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" required name="txt_email" id="txt_email" value="<?php echo $data["user_email"]; ?>"/></td>
                </tr>
                <tr>
                    <th>District</th>
                    <td>
                        <select name="btn_district" required id="btn_district" onchange="getPlace(this.value)">
                            <option><?php echo $data["District_name"]; ?></option>
                            <?php
                            $selQryOne = "SELECT * FROM tbl_district";
                            $resultone = $con->query($selQryOne);
                            while ($data = $resultone->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $data["District_id"]; ?>"><?php echo $data["District_name"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Place</th>
                    <td>
                        <select name="btn_place" required id="btn_place">
                            <option>Select</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
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


<?php
include("Foot.php");
?>
