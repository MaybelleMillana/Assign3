<?php
include_once "../config/Database.php";
include_once "../models/Player.php";

$db = (new Database())->getConnection();
$playerModel = new Player($db);

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_player'])) {
    $name = $_POST['playerName'];

    if (!empty($name)) {
        $stmt = $db->prepare("INSERT INTO player (playerName) VALUES (?)");
        if ($stmt->execute([$name])) {
            $message = "Player added successfully!";
        } else {
            $message = "Failed to add player.";
        }
    } else {
        $message = "Player name is required.";
    }
}

$players = $playerModel->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Category</title>
    <style>
        body { background-color: #f4d4bd; font-family: Arial, sans-serif; }
        header { background: #000; color: #fff; padding: 15px; font-size: 20px; }
        .container { width: 80%; margin: 30px auto; }
        .form-section { background-color: #f8dbc1; padding: 20px; border: 1px solid #000; }
        input[type=text] { width: 300px; padding: 5px; }
        .btn { padding: 10px 20px; margin: 10px 5px; cursor: pointer; border: none; }
        .btn-add { background-color: lightgreen; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; background-color: white; }
        th, td { padding: 10px; border: 1px solid #000; }
        .msg { font-weight: bold; color: green; }
    </style>
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>


    <div class="container">
        <h2>Player Category</h2>
        <form method="post" class="form-section">
            <label>Player Name: </label>
            <input type="text" name="playerName" required />
            <button type="submit" name="add_player" class="btn btn-add">Add Player</button>
        </form>

        <?php if ($message): ?>
            <p class="msg"><?= $message ?></p>
        <?php endif; ?>

        <h3>Players List</h3>
        <table>
            <tr>
                <th>Player ID</th>
                <th>Player Name</th>
            </tr>
            <?php foreach ($players as $player): ?>
            <tr>
                <td><?= $player['playerId'] ?></td>
                <td><?= $player['playerName'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php include_once "footer.php"; ?>
</body>
</html>
