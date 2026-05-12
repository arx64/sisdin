<?php
/**
 * Design Factor Model
 */
class DesignFactor extends Model {
    protected $table = 'design_factor';

    /**
     * Get design factor by kategori
     */
    public function getByKategori($kategori) {
        $sql = "SELECT * FROM " . $this->table . " WHERE kategori = '$kategori' LIMIT 1 ORDER BY id ASC";
        return $this->fetchOne($sql);
    }

    /**
     * Update design factor value
     */
    public function updateValue($id, $value) {
        $sql = "UPDATE " . $this->table . " SET deskripsi = '$value' WHERE id = $id";
        return $this->execQuery($sql);
    }
}
?>