<?php
include_once "../config/Database.php";
include_once "../models/Game.php";


$editMode = false;
$editGame = null;


$db = (new Database())->getConnection();
$gameModel = new Game($db);



// Handle form submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_game'])) {
    $gameModel->gameName = $_POST['gameName'];
    $gameModel->numberRounds = $_POST['numberRounds'];
    $gameModel->totalCompletionTime = $_POST['totalCompletionTime'];

    if ($gameModel->create()) {
        $message = "Game added successfully!";
    } else {
        $message = "Error adding game.";
    }
}
// Handle update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_game'])) {
    $gameModel->gameId = $_POST['gameId'];  // Ensure gameId is included
    $gameModel->gameName = $_POST['gameName'];
    $gameModel->numberRounds = $_POST['numberRounds'];
    $gameModel->totalCompletionTime = $_POST['totalCompletionTime'];

    if ($gameModel->update()) {
        $message = "Game updated successfully!";
    } else {
        $message = "Error updating game.";
    }
}
// Handle delete
if (isset($_GET['delete_id'])) {
    if ($gameModel->delete($_GET['delete_id'])) {
        $message = "Game deleted.";
    } else {
        $message = "Error deleting game.";
    }
}

// Check if edit button was clicked
if (isset($_GET['edit_id'])) {
    $editMode = true;
    $editGame = $gameModel->getById($_GET['edit_id']);
}

// Fetch all games
$games = $gameModel->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game Category - G2P Allocation System</title>
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
        }

        header a {
            color: white;
            text-decoration: none;
        }

        .container {
            width: 80%;
            margin: 30px auto;
        }

        h2 {
            margin-top: 0;
        }

        form {
            background-color: #f8dbc1;
            padding: 20px;
            border: 1px solid #000;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type=text], input[type=number] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .btn {
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            border: none;
            margin: 10px 5px 0 0;
        }

        .btn-view {
            background-color: steelblue;
            color: white;
        }

        .btn-add {
            background-color: lightgreen;
            color: black;
        }

        .message {
            font-weight: bold;
            color: green;
            margin-top: 10px;
        }

        table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>


    <div class="container">
        <h2>Game Section</h2>
        <form method="post">
    <?php if ($editMode): ?>
        <input type="hidden" name="gameId" value="<?= $editGame['gameId'] ?>">
    <?php endif; ?>

    <label>Game Name:</label>
    <input type="text" name="gameName" required value="<?= $editMode ? htmlspecialchars($editGame['gameName']) : '' ?>">

    <label>Number of Rounds:</label>
    <input type="number" name="numberRounds" required value="<?= $editMode ? htmlspecialchars($editGame['numberRounds']) : '' ?>">

    <label>Total Completion Time:</label>
    <input type="text" name="totalCompletionTime" required value="<?= $editMode ? htmlspecialchars($editGame['totalCompletionTime']) : '' ?>">

    <?php if ($editMode): ?>
        <button type="submit" name="update_game" class="btn btn-add">Update Game</button>
    <?php else: ?>
        <button type="submit" name="add_game" class="btn btn-add">Add Game</button>
    <?php endif; ?>
</form>

        <?php if ($message): ?>
            <p class="message"><?= $message ?></p>
        <?php endif; ?>

        <h3>Games Available</h3>
        <table>
        <tr>
            <th>Game ID</th>
            <th>Game Name</th>
            <th>Number of Rounds</th>
            <th>Total Completion Time</th>
            <th>Actions</th>
        </tr>
            <?php foreach ($games as $game): ?>
                <tr>
                    <td><?= $game['gameId'] ?></td>
                    <td><?= $game['gameName'] ?></td>
                    <td><?= $game['numberRounds'] ?></td>
                    <td><?= $game['totalCompletionTime'] ?></td>
                    <td>
                        <a href="?edit_id=<?= $game['gameId'] ?>" class="btn ">Edit</a>
                        <a href="?delete_id=<?= $game['gameId'] ?>" class="btn " onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php include_once "footer.php"; ?>
</body>
</html>
