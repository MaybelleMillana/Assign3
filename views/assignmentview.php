<?php
include_once "../config/Database.php";
include_once "../models/Game.php";
include_once "../models/Player.php";
include_once "../models/Assignment.php";

$db = (new Database())->getConnection();
$gameModel = new Game($db);
$playerModel = new Player($db);
$assignmentModel = new Assignment($db);

// Handle assignment form submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['assign'])) {
    $assignmentModel->gameId = $_POST['gameId'];
    $assignmentModel->playerId = $_POST['playerId'];
    $assignmentModel->date = date('Y-m-d');

    if ($assignmentModel->create()) {
        $message = "Game assigned to player successfully!";
    } else {
        $message = "Assignment failed!";
    }
}

// Load dropdown data
$games = $gameModel->getAll();
$players = $playerModel->getAll();
$assignments = $assignmentModel->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Game to Player</title>
    <style>
        body {
            background-color: #f8dbb8;
            font-family: Arial, sans-serif;
        }

        header {
            background: #000;
            color: white;
            padding: 15px;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 22px;
        }

        .container {
            width: 80%;
            margin: 30px auto;
        }

        h2 {
            margin-top: 0;
        }

        form {
            background-color: #fef6ea;
            padding: 20px;
            border: 1px solid #ccc;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 20px;
            background-color: steelblue;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .message {
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }

        table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
<?php include_once "header.php"; ?>


<div class="container">
    <h2>Assign a Game to Player</h2>

    <form method="post">
        <label for="gameId">Select Game:</label>
        <select name="gameId" required>
            <option value="">-- Select Game --</option>
            <?php foreach ($games as $game): ?>
                <option value="<?= $game['gameId'] ?>"><?= $game['gameName'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="playerId">Select Player:</label>
        <select name="playerId" required>
            <option value="">-- Select Player --</option>
            <?php foreach ($players as $player): ?>
                <option value="<?= $player['playerId'] ?>"><?= $player['playerName'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="assign" class="btn">Assign</button>
    </form>

    <?php if ($message): ?>
        <p class="message"><?= $message ?></p>
    <?php endif; ?>

    <h3>Assignment Records</h3>
    <table>
        <tr>
            <th>Assignment ID</th>
            <th>Player Name</th>
            <th>Game Name</th>
            <th>Date</th>
        </tr>
        <?php foreach ($assignments as $assign): ?>
            <tr>
                <td><?= $assign['assigningId'] ?></td>
                <td><?= $assign['playerName'] ?></td>
                <td><?= $assign['gameName'] ?></td>
                <td><?= $assign['date'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include_once "footer.php"; ?>

</body>
</html>
