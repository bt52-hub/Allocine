<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Film
{
    public static function getAll(): array
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->query("SELECT * FROM films");

        return $stmt->fetchAll();
    }
}