<?php
/**
 * Base Database Class
 * Untuk menghubungkan ke database dan eksekusi query
 */
class Database {
    private $conn;

    public function __construct() {
        // Include config file untuk mendapatkan constants
        if (!file_exists(__DIR__ . '/../../config/database.php')) {
            die("Config file not found: " . __DIR__ . '/../../config/database.php');
        }
        
        require_once __DIR__ . '/../../config/database.php';
        
        // Create connection menggunakan constants dari config
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        // Set charset
        $this->conn->set_charset("utf8mb4");
    }

    /**
     * Execute query
     */
    public function query($sql) {
        return $this->conn->query($sql);
    }

    /**
     * Execute query dengan prepared statement
     */
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    /**
     * Get single row
     */
    public function fetchOne($sql) {
        $result = $this->query($sql);
        return $result->fetch_assoc();
    }

    /**
     * Get all rows
     */
    public function fetchAll($sql) {
        $result = $this->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Get connection
     */
    public function getConnection() {
        return $this->conn;
    }
}
?>