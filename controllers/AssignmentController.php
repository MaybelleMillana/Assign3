<?php

require_once 'models/Assignment.php';
require_once 'ControllerBase.php';
class AssignmentController extends ControllerBase {
    public function __construct() {
        parent::__construct();
        $this->model = new Assignment($this->db->getConnection());
    }

    public function index() {
        $assignments = $this->model->getAssignments();
        include 'views/assignment.php';
    }

    public function assign() {
        if ($_POST) {
            $this->model->assignGameToPlayer($_POST['player_id'], $_POST['game_id']);
            header("Location: /assignments");
        }
        include 'views/assignment.php';
    }
}
?>
