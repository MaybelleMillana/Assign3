<h1>Players</h1>
<form method="POST" action="/players/add">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="date" name="date_of_birth" required>
    <button type="submit">Add Player</button>
</form>
<ul>
    <?php while ($player = $players->fetch(PDO::FETCH_ASSOC)) { ?>
        <li><?= $player['first_name'] ?> <?= $player['last_name'] ?></li>
    <?php } ?>
</ul>
