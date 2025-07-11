<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrify</title>
    <link rel="stylesheet" href="../Assets/Template/Main/css/bootstrap.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/font-awesome.min.css">
    <style>
        body 
        {
            background-color: #111;
            color: #fff;
            font-family: Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header_section {
            background: #111;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            padding: 20px 0;
            position: relative;
            width: 100%;
            height: 90px;
            text-align: center;
        }
        .navbar-brand h1 {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.4);
        }
        .navbar-nav .nav-link {
            color: #eee;
            font-weight: 500;
            padding: 8px 16px;
            transition: color 0.3s, border-bottom 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #ff6666;
            border-bottom: 2px solid #ff6666;
        }
    </style>
</head>
<body>
<div class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand"><h1>Electrify</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                ☰
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
</body>
</html>