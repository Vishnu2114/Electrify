<?php
include('../Assets/Connection/Connection.php');
include("Head.php");

if (isset($_POST["btn_submit"])) 
{
    $title = $_POST['txt_title'];
    $content = $_POST['txt_content'];
    $insQry = "insert into tbl_complaint(complaint_title, complaint_content, user_id) values('$title', '$content', '".$_SESSION['uid']."')";
    if ($con->query($insQry)) {
        echo "<script>alert('Complaint has been sent'); window.location='Complaint.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Complaint Page</title>
<style>
    body 
    {
        background-image: url('../Assets/Template/Main/images/complaintss.jpeg');
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
    table 
    {
        width: 100%;
        color: #f0f0f0;
        margin: 0 auto;
    }
    table, th, td 
    {
        padding: 8px;
        text-align: center;
    }
    input[type="text"], input[type="submit"] 
    {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    input[type="submit"] 
    {
        background-color: #333;
        color: #fff;
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
        <h2 align="center">File a Complaint</h2>
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" required name="txt_title" id="txt_title" /></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><input type="text" required name="txt_content" id="txt_content" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
            </tr>
        </table>
    </form>
</div>

<div class="form-container">
    <table border=1>
        <tr>
            <th>Sl no</th>
            <th>Title</th>
            <th>Content</th>
            <th>Reply</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_complaint";
        $result = $con->query($selQry);
        while ($data = $result->fetch_assoc()) 
        {
            $i++;
            echo "<tr>
                    <td>{$i}</td>
                    <td>{$data['complaint_title']}</td>
                    <td>{$data['complaint_content']}</td>
                    <td>{$data['complaint_replay']}</td>
                  </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
<br>
<br>
<br>
<br>
<br>

<?php include("Foot.php"); ?>
