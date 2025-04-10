<?php
class Assignment {
    private $conn;
    private $table_name = "assignments";

    public $assignment_id;
    public $game_id;
    public $player_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function assignGame() {
        $query = "INSERT INTO " . $this->table_name . " (game_id, player_id) VALUES (:game_id, :player_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":game_id", $this->game_id);
        $stmt->bindParam(":player_id", $this->player_id);
        return $stmt->execute();
    }

    public function getAllAssignments() {
        $query = "SELECT a.assignment_id, g.game_name, p.name AS player_name 
                  FROM " . $this->table_name . " a
                  JOIN games g ON a.game_id = g.game_id
                  JOIN players p ON a.player_id = p.player_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
