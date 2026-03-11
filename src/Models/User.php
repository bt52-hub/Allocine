<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    public static function findByEmail(string $email): ?array
    {
        $db = Database::getInstance()->getConnection();

        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public static function create(string $email, string $password, string $pseudo): bool
    {
        $db = Database::getInstance()->getConnection();

        $hash = password_hash($password, PASSWORD_ARGON2ID);

        $sql = "INSERT INTO users (email, password, pseudo)
            VALUES (:email, :password, :pseudo)";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            'email'    => $email,
            'password' => $hash,
            'pseudo'   => $pseudo
        ]);
    }
}
