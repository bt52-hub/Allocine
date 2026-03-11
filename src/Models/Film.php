<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Film
{
    public static function getAll(): array
    {
        $db = Database::getInstance()->getConnection();

        $sql = "SELECT * FROM films";
        $stmt = $db->query($sql);

        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $db = Database::getInstance()->getConnection();

        $sql = 'SELECT films.*, GROUP_CONCAT(genres.nom SEPARATOR ", ") AS genres
            FROM films
            LEFT JOIN film_genre ON films.id = film_genre.film_id
            LEFT JOIN genres ON film_genre.genre_id = genres.id
            WHERE films.id = :id
            GROUP BY films.id';

        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);

        $film = $stmt->fetch();

        return $film ?: null;
    }
    public static function create(array $data): bool
{
    $db = Database::getInstance()->getConnection();

    $sql = "INSERT INTO films (titre, realisateur, annee, duree, synopsis, affiche)
            VALUES (:titre, :realisateur, :annee, :duree, :synopsis, :affiche)";

    $stmt = $db->prepare($sql);
    return $stmt->execute($data);
}

public static function update(int $id, array $data): bool
{
    $db = Database::getInstance()->getConnection();

    $sql = "UPDATE films SET
                titre = :titre,
                realisateur = :realisateur,
                annee = :annee,
                duree = :duree,
                synopsis = :synopsis
            WHERE id = :id";

    $data['id'] = $id;
    $stmt = $db->prepare($sql);
    return $stmt->execute($data);
}

public static function delete(int $id): bool
{
    $db = Database::getInstance()->getConnection();

    $sql = "DELETE FROM films WHERE id = :id";
    $stmt = $db->prepare($sql);
    return $stmt->execute([':id' => $id]);
}
}

