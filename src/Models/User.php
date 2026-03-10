<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    public static function getAll(): array
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->query("SELECT * FROM users");

        return $stmt->fetchAll();
    }
}