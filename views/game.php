
<h1>Games</h1>
<form method="POST" action="/games/add">
    <input type="text" name="game_name" placeholder="Game Name" required>
    <input type="text" name="genre" placeholder="Genre">
    <input type="date" name="release_date" required>
    <button type="submit">Add Game</button>
</form>
<ul>
    <?php while ($game = $games->fetch(PDO::FETCH_ASSOC)) { ?>
        <li><?= $game['game_name'] ?> (<?= $game['genre'] ?>)</li>
    <?php } ?>
</ul>
