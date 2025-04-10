<!DOCTYPE html>
<html>
<head>
    <title>Assign Game - G2P Allocation System</title>
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
            margin: 20px auto;
        }

        h2 {
            margin-bottom: 10px;
        }

        form {
            background-color: #f8dbc1;
            padding: 20px;
            border: 1px solid #000;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        select {
            width: 250px;
            padding: 5px;
        }

        .btn {
            padding: 10px 20px;
            margin: 10px 5px;
            cursor: pointer;
            border: none;
        }

        .btn-assign {
            background-color: lightgreen;
        }

        .btn-view {
            background-color: steelblue;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
        }

        .msg {
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
        <h2>Assign a Game to Player</h2>

        <form method="POST">
            <label>Select Player:</label>
            <select name="playerId" required>
                <option value="">-- Select Player --</option>
                <?php foreach ($players as $player): ?>
                    <option value="<?= $player['playerId'] ?>"><?= $player['playerName'] ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label>Select Game:</label>
            <select name="gameId" required>
                <option value="">-- Select Game --</option>
                <?php foreach ($games as $game): ?>
                    <option value="<?= $game['gameId'] ?>"><?= $game['gameName'] ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <button type="submit" name="assign" class="btn btn-assign">Assign</button>
            <button type="submit" name="view_assignments" class="btn btn-view">View Assignments</button>
        </form>

        <?php if ($message): ?>
            <p class="msg"><?= $message ?></p>
        <?php endif; ?>

        <?php if (!empty($assignments)): ?>
            <h2>Assignments</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Player</th>
                    <th>Game</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($assignments as $row): ?>
                    <tr>
                        <td><?= $row['assigningId'] ?></td>
                        <td><?= $row['playerName'] ?></td>
                        <td><?= $row['gameName'] ?></td>
                        <td><?= $row['date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
