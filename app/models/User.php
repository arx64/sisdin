<?php
/**
 * User Model
 */
class User extends Model {
    protected $table = 'users';

    /**
     * Get user by username
     */
    public function getByUsername($username) {
        $sql = "SELECT * FROM " . $this->table . " WHERE username = '$username' LIMIT 1";
        return $this->fetchOne($sql);
    }

    /**
     * Verify password
     */
    public function verifyPassword($password, $hashed) {
        return password_verify($password, $hashed);
    }

    /**
     * Hash password
     */
    public function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
?>