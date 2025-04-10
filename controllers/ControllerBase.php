<?php
require_once 'config/Database.php';
class ControllerBase {
    protected $db;
    protected $model;

    public function __construct() {
        $this->db = new Database();
    }
}
?>
