<?php
include_once "config/Database.php";
include_once "models/Player.php";
include_once "models/Game.php";
include_once "models/Assigning.php";

$database = new Database();
$db = $database->getConnection();

$playerModel = new Player($db);
$gameModel = new Game($db);
$assigningModel = new Assigning($db);

$players = $playerModel->getAll();
$games = $gameModel->getAll();
$assignments = [];

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['assign'])) {
        $assigningModel->playerId = $_POST['playerId'];
        $assigningModel->gameId = $_POST['gameId'];
        $assigningModel->date = date("Y-m-d");
        if ($assigningModel->assign()) {
            $message = "Game assigned successfully!";
        } else {
            $message = "Failed to assign game.";
        }
    }

    if (isset($_POST['view_assignments'])) {
        $assignments = $assigningModel->getAll();
    }
}

include "views/assign.php";
