<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new PDO('sqlite:database.sqlite');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->createTable();
    }

    private function createTable() {
        $this->db->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT UNIQUE,
            password TEXT
        )");
    }

    public function register($username, $password) {
        $stmt = $this->db->prepare('INSERT INTO users (username, password) VALUES (:u, :p)');
        return $stmt->execute([':u' => $username, ':p' => password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function getByUsername($username) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = :u');
        $stmt->execute([':u' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
