<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
$selQry="select *from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.District_id=p.District_id where user_id=".$_SESSION["uid"];
$result=$con->query($selQry);
$data=$result->fetch_assoc();
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <style>
        body 
        {
            font-family: Arial, sans-serif;
            background-color: rgba(0, 0, 0, 0.7);
            color: #f0f0f0;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container 
        {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form 
        {
            background-color: rgba(0, 0, 0, 0.7); /* Slightly transparent black */
            padding: 40px;
            border-radius: 10px;
            width: 350px;
        }
        table 
        {
            width: 100%;
            color: #ddd;
            border-collapse: collapse;
        }
        th, td 
        {
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }
        th 
        {
            color: #bbb;
            font-weight: bold;
        }
        td 
        {
            background-color: #333;
            border-radius: 5px;
        }
        .action-links 
        {
            text-align: center;
            margin-top: 10px;
        }
        .action-links a {
            display: inline-block;
            color: #eee;
            font-weight: 500;
            padding: 8px 16px;
            text-decoration: none;
            transition: color 0.3s, border-bottom 0.3s;
        }
        .action-links a:hover 
        {
            color: #ff6666;
            border-bottom: 2px solid #ff6666;
        }
    </style>
</head>
<body style="background-image:url('../Assets/Template/Main/images/myprofile-bg.jpg'); background-size: cover; ">
    <div class="form-container">
        <form method="post">
            <table>
                <tr>
                    <th>Name</th>
                    <td><?php echo $data["user_name"]; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $data["user_email"]; ?></td>
                </tr>
                <tr>
                    <th>District</th>
                    <td><?php echo $data["District_name"]; ?></td>
                </tr>
                <tr>
                    <th>Place</th>
                    <td><?php echo $data["place_name"]; ?></td>
                </tr>
                <tr>
                    <th colspan="2" class="action-links">
                        <a href="EditProfile.php">Edit Profile</a>
                    </th>
                </tr>
                <!-- <tr>
                    <th colspan="2" class="action-links">
                        <a href="ChangePassword.php">Change Password</a>
                    </th> -->
                </tr>
                <tr>
                    <th colspan="2" class="action-links">
                        <a href="Delete.php">Delete Account</a>
                    </th>
                </tr>
                <tr>
                    <th colspan="2" class="action-links">
                        <a href="Logout.php">Logout</a>
                    </th>
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

<?php include("Foot.php"); ?>