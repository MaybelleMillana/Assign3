<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G2P Allocation System</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f8ff; /* Light blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        select {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .view-assignments {
            background-color: #add8e6; /* Light blue */
            color: #fff;
        }

        .assign {
            background-color: #90ee90; /* Light green */
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>G2P Allocation System</h1>
        <h2>Assign a Game to Player</h2>
        <div class="form-group">
            <label for="game">Select Game:</label>
            <select id="game">
                <option>Select the game</option>
                </select>
        </div>
        <div class="form-group">
            <label for="player">Select Player:</label>
            <select id="player">
                <option>Select the player</option>
                </select>
        </div>
        <div class="button-container">
            <button class="view-assignments">View Assignments</button>
            <button class="assign">Assign</button>
        </div>
    </div>
</body>
</html>