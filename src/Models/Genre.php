<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Genre
{
    public static function getAll(): array
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->query("SELECT * FROM genres");

        return $stmt->fetchAll();
    }
}