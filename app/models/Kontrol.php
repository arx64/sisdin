<?php
/**
 * Kontrol Model
 */
class Kontrol extends Model {
    protected $table = 'kontrol';

    /**
     * Get all kontrol records
     */
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        return $this->fetchAll($sql);
    }

    /**
     * Get kontrol by ID
     */
    public function getById($id) {
        $id = (int) $id;
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id LIMIT 1";
        return $this->fetchOne($sql);
    }

    /**
     * Create new kontrol entry
     */
    public function create($data) {
        $conn = $this->db->getConnection();
        $risk_id = $conn->real_escape_string($data['risk_id']);
        $aspek = $conn->real_escape_string($data['aspek']);
        $judul_kontrol = $conn->real_escape_string($data['judul_kontrol']);
        $deskripsi = $conn->real_escape_string($data['deskripsi']);
        $dokumen_terkait = $conn->real_escape_string($data['dokumen_terkait']);

        $sql = "INSERT INTO " . $this->table . " 
                (risk_id, aspek, judul_kontrol, deskripsi, dokumen_terkait)
                VALUES ('$risk_id', '$aspek', '$judul_kontrol', '$deskripsi', '$dokumen_terkait')";

        return $this->execQuery($sql);
    }

    /**
     * Update kontrol by ID
     */
    public function updateData($id, $data) {
        $id = (int) $id;
        $conn = $this->db->getConnection();
        $risk_id = $conn->real_escape_string($data['risk_id']);
        $aspek = $conn->real_escape_string($data['aspek']);
        $judul_kontrol = $conn->real_escape_string($data['judul_kontrol']);
        $deskripsi = $conn->real_escape_string($data['deskripsi']);
        $dokumen_terkait = $conn->real_escape_string($data['dokumen_terkait']);

        $sql = "UPDATE " . $this->table . " SET 
                risk_id = '$risk_id',
                aspek = '$aspek',
                judul_kontrol = '$judul_kontrol',
                deskripsi = '$deskripsi',
                dokumen_terkait = '$dokumen_terkait',
                updated_at = CURRENT_TIMESTAMP
                WHERE id = $id";

        return $this->execQuery($sql);
    }

    /**
     * Delete kontrol by ID
     */
    public function deleteData($id) {
        $id = (int) $id;
        $sql = "DELETE FROM " . $this->table . " WHERE id = $id";
        return $this->execQuery($sql);
    }
}
?>