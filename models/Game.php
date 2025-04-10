<?php

class Game {
    private $conn;
    private $table_name = "games";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllGames() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addGame($game_name, $genre, $release_date) {
        $query = "INSERT INTO " . $this->table_name . " (game_name, genre, release_date) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$game_name, $genre, $release_date]);
    }
}
?>
