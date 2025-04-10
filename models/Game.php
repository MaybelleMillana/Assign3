<?php
class Game {
    private $conn;
    private $table = "game";

    public $gameId;
    public $gameName;
    public $numberRounds;
    public $totalCompletionTime;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function create() {
        $query = "INSERT INTO " . $this->table . " (gameName, numberRounds, totalCompletionTime) 
                  VALUES (:gameName, :numberRounds, :totalCompletionTime)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":gameName", $this->gameName);
        $stmt->bindParam(":numberRounds", $this->numberRounds);
        $stmt->bindParam(":totalCompletionTime", $this->totalCompletionTime);
        return $stmt->execute();
    }

    // READ ALL
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY gameId DESC";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ SINGLE
    public function getById($gameId) {
        $query = "SELECT * FROM " . $this->table . " WHERE gameId = :gameId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":gameId", $gameId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET gameName = :gameName, numberRounds = :numberRounds, totalCompletionTime = :totalCompletionTime 
                  WHERE gameId = :gameId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":gameName", $this->gameName);
        $stmt->bindParam(":numberRounds", $this->numberRounds);
        $stmt->bindParam(":totalCompletionTime", $this->totalCompletionTime);
        $stmt->bindParam(":gameId", $this->gameId);
        return $stmt->execute();
    }

    // DELETE
    public function delete($gameId) {
        $query = "DELETE FROM " . $this->table . " WHERE gameId = :gameId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":gameId", $gameId);
        return $stmt->execute();
    }
}
