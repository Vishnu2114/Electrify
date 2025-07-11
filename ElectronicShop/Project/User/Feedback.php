<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

if (isset($_POST["btn_submit"])) 
{
    $cont = $_POST["txt_cont"];
    $insQry = "insert into tbl_feedback(feedback_cont) values('$cont')";
    
    if ($con->query($insQry)) {
        echo "<script>alert('Feedback Sent'); window.location='Feedback.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Feedback</title>
<style>
    body 
    {
        background-image: url('../Assets/Template/Main/images/feedback.jpg');
        background-size: cover;
        font-family: Arial, sans-serif;
        color: #f0f0f0;
    }
    .form-container 
    {
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        margin: 40px auto;
        padding: 20px;
    }
    .form-container h2 
    {
        text-align: center;
    }
    table {
        width: 100%;
        color: #f0f0f0;
        margin: 0 auto;
    }
    table, th, td 
    {
        padding: 8px;
        text-align: center;
    }
    input[type="text"] 
    {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    input[type="submit"] 
    {
        width: 100%;
        padding: 10px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover 
    {
        background-color: #444;
    }
</style>
</head>

<body>
<div class="form-container">
    <form id="form1" name="form1" method="post" action="">
        <h2>Sent a Feedback</h2>
        <table>
            <tr>
                <td align="center">Content</td>
                <td align="center"><input type="text" required name="txt_cont" id="txt_cont" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
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
<br>
<br>
<br>

<?php include("Foot.php"); ?>
