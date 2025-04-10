<?php

require_once 'models/Game.php';
require_once 'ControllerBase.php';
class GameController extends ControllerBase {
    public function __construct() {
        parent::__construct();
        $this->model = new Game($this->db->getConnection());
    }

    public function index() {
        $games = $this->model->getAllGames();
        include 'views/game.php';
    }

    public function add() {
        if ($_POST) {
            $this->model->addGame($_POST['game_name'], $_POST['genre'], $_POST['release_date']);
            header("Location: /games");
        }
        include 'views/game.php';
    }
}
?>
