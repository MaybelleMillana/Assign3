<?php
class Assignment {
    private $conn;
    private $table = "assigning";

    public $assigningId;
    public $playerId;
    public $gameId;
    public $date;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (playerId, gameId, date)
                  VALUES (:playerId, :gameId, :date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':playerId', $this->playerId);
        $stmt->bindParam(':gameId', $this->gameId);
        $stmt->bindParam(':date', $this->date);
        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT a.assigningId, a.date, p.playerName, g.gameName 
                  FROM " . $this->table . " a
                  JOIN player p ON a.playerId = p.playerId
                  JOIN game g ON a.gameId = g.gameId
                  ORDER BY a.assigningId DESC";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
