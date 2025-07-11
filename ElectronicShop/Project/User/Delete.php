<?php
session_start();
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_confirm"])) {
    $delQueries = [
        "DELETE FROM tbl_user WHERE user_id = " . $_SESSION["uid"],
        "DELETE FROM tbl_purchase WHERE user_id = " . $_SESSION["uid"],
        "DELETE FROM tbl_rating WHERE user_id = " . $_SESSION["uid"],
        "DELETE FROM tbl_complaint WHERE user_id = " . $_SESSION["uid"]
    ];
    foreach ($delQueries as $query) {
        if ($con->query($query)) {
            echo "<script>alert('Deleted'); window.location='Delete.php';</script>";
        }
    }
}

if (isset($_POST["btn_chancel"])) {
    header("location:MyProfile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Confirm Deletion</title>
<style>
    body {
        background-image: url('../Assets/Template/Main/images/your-background.jpg');
        background-size: cover;
        font-family: Arial, sans-serif;
        color: #f0f0f0;
    }
    .form-container {
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        margin: 100px auto;
        padding: 20px;
        color: #f0f0f0;
        text-align: center;
    }
    
    input[type="submit"] {
        width: 100px;
        padding: 10px;
        margin: 10px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color:rgb(245, 57, 57);
    }
</style>
</head>

<body>
<div class="form-container">
    <h2>Confirm Account Deletion</h2>
    <form id="form1" name="form1" method="post" action="">
        <p>Do you really want to delete your account?</p>
        <input type="submit" name="btn_confirm" id="btn_confirm" value="Confirm" /> 
        <input type="submit" name="btn_chancel" id="btn_chancel" value="Cancel" />
    </form>
</div>
</body>
</html>
