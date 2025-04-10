<!DOCTYPE html>
<html>
<head>
    <title>Game Category - G2P</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4d4bd;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            margin: auto;
            padding: 20px;
        }

        header {
            background-color: black;
            color: white;
            padding: 15px;
            font-size: 22px;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        h2 {
            margin-top: 20px;
        }

        form {
            background-color: #f8dbc1;
            padding: 20px;
            border: 1px solid #000;
        }

        table input[type="text"], input[type="number"] {
            width: 300px;
            padding: 8px;
        }

        table td {
            padding: 8px;
        }

        .btn-view {
            background-color: steelblue;
            color: white;
            padding: 8px 16px;
            margin-right: 10px;
            border: 1px solid black;
            cursor: pointer;
        }

        .btn-add {
            background-color: lightgreen;
            color: black;
            padding: 8px 16px;
            border: 1px solid black;
            cursor: pointer;
        }

        .game-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
        }

        .game-table th, .game-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .message {
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php">G2P Allocation System</a>
    </header>
    <div class="container">
        <h2>Game Section</h2>
        <form method="POST">
            <table>
                <tr>
                    <td><label for="game_id">Game Id:</label></td>
                    <td><input type="text" id="game_id" name="game_id" placeholder="Enter the Game Id" disabled></td>
                </tr>
                <tr>
                    <td><label for="game_name">Game Name:</label></td>
                    <td><input type="text" id="game_name" name="game_name" placeholder="Enter the Game Name" required></td>
                </tr>
                <tr>
                    <td><label for="num_rounds">Number of Rounds:</label></td>
                    <td><input type="number" id="num_rounds" name="num_rounds" placeholder="Enter the count" required></td>
                </tr>
                <tr>
                    <td><label for="total_time">Total Completion Time:</label></td>
                    <td><input type="number" id="total_time" name="total_time" placeholder="Enter the completion time" required></td>
                </tr>
            </table>
            <br>
            <button class="btn-view" type="submit" name="view_games">View Games</button>
            <button class="btn-add" type="submit" name="add_game">Add Game</button>
        </form>


</html>

<?php
require_once 'Database.php';
if (isset($_GET['submit'])) {
    $gameId = $_GET["game_id"];
    $gname = $_GET["game_name"];
    $numR = $_GET["num_rounds"];
    $totalT = $_GET["total_time"];
    
    $sqlstmt = "INSERT INTO CUSTOMERS(game_id,game_name,num_rounds,total_time) VALUES ('".$gameId."','".$gname."''".$numR."''".$totalT."')";
    $queryId = mysqli_query($connectionId, $sqlstmt);
    if($queryId == TRUE)
    {
        echo "<h2>Players has been added successfully </h2>";
    }
    else 
    {
        echo "<h2>" .mysqli_error($connectionId). "</h2>";
    }
}
?>