<?php
/**
 * Risiko Model
 */
class Risiko extends Model {
    protected $table = 'risiko';

    /**
     * Create risiko dengan auto risk score
     */
    public function createRisiko($data) {
        // Hitung risk score
        $likelihood = $data['likelihood'];
        $impact = $data['impact'];
        $risk_score = $likelihood * $impact;

        // Tentukan level risiko
        $level_risiko = $this->getLevelRisiko($risk_score);

        // Insert ke database
        $sql = "INSERT INTO " . $this->table . " 
                (nama_risiko, aset, deskripsi, likelihood, impact, risk_score, level_risiko) 
                VALUES ('{$data['nama_risiko']}', '{$data['aset']}', '{$data['deskripsi']}', 
                $likelihood, $impact, $risk_score, '$level_risiko')";
        return $this->execQuery($sql);
    }

    /**
     * Update risiko dengan auto risk score
     */
    public function updateRisiko($id, $data) {
        // Hitung risk score
        $likelihood = $data['likelihood'];
        $impact = $data['impact'];
        $risk_score = $likelihood * $impact;

        // Tentukan level risiko
        $level_risiko = $this->getLevelRisiko($risk_score);

        // Update ke database
        $sql = "UPDATE " . $this->table . " SET 
                nama_risiko = '{$data['nama_risiko']}', 
                aset = '{$data['aset']}', 
                deskripsi = '{$data['deskripsi']}', 
                likelihood = $likelihood, 
                impact = $impact, 
                risk_score = $risk_score, 
                level_risiko = '$level_risiko' 
                WHERE id = $id";
        return $this->execQuery($sql);
    }

    /**
     * Get level risiko berdasarkan score
     */
    public function getLevelRisiko($score) {
        if ($score >= 17) {
            return 'Extreme';
        } elseif ($score >= 10) {
            return 'High';
        } elseif ($score >= 5) {
            return 'Medium';
        } else {
            return 'Low';
        }
    }

    /**
     * Get risiko by level
     */
    public function getByLevel($level) {
        $sql = "SELECT * FROM " . $this->table . " WHERE level_risiko = '$level' ORDER BY risk_score DESC";
        return $this->fetchAll($sql);
    }

    /**
     * Get total risiko by level
     */
    public function getTotalByLevel() {
        $sql = "SELECT level_risiko, COUNT(*) as total FROM " . $this->table . " GROUP BY level_risiko";
        return $this->fetchAll($sql);
    }

    /**
     * Search risiko
     */
    public function search($keyword) {
        $sql = "SELECT * FROM " . $this->table . " 
                WHERE nama_risiko LIKE '%$keyword%' 
                OR aset LIKE '%$keyword%' 
                OR deskripsi LIKE '%$keyword%' 
                ORDER BY id DESC";
        return $this->fetchAll($sql);
    }
}
?>