

<!DOCTYPE html>
<html>
<head>
    <title>G2P Allocation System</title>
    <style>
        body {
            background-color: #f4d4bd;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background: #000;
            color: #fff;
            padding: 15px;
            font-size: 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            text-align: center;
        }

        .btn {
            display: inline-block;
            margin: 15px;
            padding: 20px 30px;
            background-color: #444;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 10px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
<!-- index.php -->
<?php include('views/header.php'); ?>
<!-- Your page content here -->
    <div class="container">
        <a href="views/gameview.php" class="btn">Game Category</a>
        <a href="views/playerview.php" class="btn">Player Category</a>
        <a href="views/assignmentview.php" class="btn">G2P Assigning</a>
    </div>
</body>
</html>
