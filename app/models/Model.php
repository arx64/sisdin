<?php
/**
 * Base Model Class
 * Abstract class untuk semua model
 */
abstract class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get all records
     */
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id ASC";
        return $this->db->fetchAll($sql);
    }

    /**
     * Get record by ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id LIMIT 1";
        return $this->db->fetchOne($sql);
    }

    /**
     * Insert record
     */
    public function insert($data) {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO " . $this->table . " ($columns) VALUES ('$values')";
        return $this->db->query($sql);
    }

    /**
     * Update record
     */
    public function update($id, $data) {
        $updates = [];
        foreach ($data as $key => $value) {
            $updates[] = "$key = '$value'";
        }
        $setClause = implode(", ", $updates);
        $sql = "UPDATE " . $this->table . " SET $setClause WHERE id = $id";
        return $this->db->query($sql);
    }

    /**
     * Delete record
     */
    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = $id";
        return $this->db->query($sql);
    }

    /**
     * Execute custom query
     */
    public function execQuery($sql) {
        return $this->db->query($sql);
    }

    /**
     * Fetch one row dengan custom query
     */
    public function fetchOne($sql) {
        return $this->db->fetchOne($sql);
    }

    /**
     * Fetch all rows dengan custom query
     */
    public function fetchAll($sql) {
        return $this->db->fetchAll($sql);
    }
}
?>