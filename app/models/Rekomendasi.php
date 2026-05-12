<?php
/**
 * Rekomendasi Model
 */
class Rekomendasi extends Model {
    protected $table = 'rekomendasi';

    /**
     * Get rekomendasi by level risiko
     */
    public function getByLevel($level_risiko) {
        $sql = "SELECT * FROM " . $this->table . " WHERE level_risiko = '$level_risiko'";
        return $this->fetchAll($sql);
    }

    /**
     * Get semua rekomendasi dengan risiko yang terkait
     */
    public function getAllWithRisiko() {
        $sql = "SELECT r.*, COUNT(ri.id) as jumlah_risiko 
                FROM " . $this->table . " r 
                LEFT JOIN risiko ri ON ri.level_risiko = r.level_risiko 
                GROUP BY r.id 
                ORDER BY FIELD(r.level_risiko, 'Extreme', 'High', 'Medium', 'Low')";
        return $this->fetchAll($sql);
    }
}
?>