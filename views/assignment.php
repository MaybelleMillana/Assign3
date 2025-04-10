<h1>Assign Game to Player</h1>
<form method="POST" action="/assignments/assign">
    <select name="player_id" required>
        <?php while ($player = $players->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $player['player_id'] ?>"><?= $player['first_name'] ?> <?= $player['last_name'] ?></option>
        <?php } ?>
    </select>
    <select name="game_id" required>
        <?php while ($game = $games->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $game['game_id'] ?>"><?= $game['game_name'] ?></option>
        <?php } ?>
    </select>
    <button type="submit">Assign Game</button>
</form>
<ul>
    <?php while ($assignment = $assignments->fetch(PDO::FETCH_ASSOC)) { ?>
        <li>Player ID: <?= $assignment['player_id'] ?> - Game ID: <?= $assignment['game_id'] ?> (<?= $assignment['assignment_date'] ?>)</li>
    <?php } ?>
</ul>
