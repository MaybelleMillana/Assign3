<?php

class Player {
    private $conn;
    private $table_name = "players";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllPlayers() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addPlayer($first_name, $last_name, $email, $date_of_birth) {
        $query = "INSERT INTO " . $this->table_name . " (first_name, last_name, email, date_of_birth) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$first_name, $last_name, $email, $date_of_birth]);
    }
}
?>

