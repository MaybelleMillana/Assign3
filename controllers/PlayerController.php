<?php

require_once 'models/Player.php';
require_once 'ControllerBase.php';
class PlayerController extends ControllerBase {
    public function __construct() {
        parent::__construct();
        $this->model = new Player($this->db->getConnection());
    }

    public function index() {
        $players = $this->model->getAllPlayers();
        include 'views/player.php';
    }

    public function add() {
        if ($_POST) {
            $this->model->addPlayer($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['date_of_birth']);
            header("Location: /players");
        }
        include 'views/player.php';
    }
}
?>
