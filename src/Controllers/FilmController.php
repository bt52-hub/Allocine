<?php

namespace App\Controllers;

use App\Models\Film;

class FilmController
{
    public function index(): void
    {
        $films = Film::getAll();

        require __DIR__ . '/../Views/films/index.php';
    }

    public function show(int $id): void
    {
        $film = Film::find($id);

        if (!$film) {
            http_response_code(404);
            echo "Film introuvable";
            return;
        }

        require __DIR__ . '/../Views/films/show.php';
    }
    private function requireAuth(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }

    public function create(): void
    {
        $this->requireAuth();
        require __DIR__ . '/../Views/films/create.php';
    }

    public function store(): void
    {
        $this->requireAuth();

        Film::create([
            'titre'       => $_POST['titre'],
            'realisateur' => $_POST['realisateur'],
            'annee'       => $_POST['annee'],
            'duree'       => $_POST['duree'],
            'synopsis'    => $_POST['synopsis'],
            'affiche'     => $_POST['affiche'] ?? null,
        ]);

        header('Location: /films');
        exit;
    }

    public function edit(int $id): void
    {
        $this->requireAuth();

        $film = Film::find($id);

        if (!$film) {
            http_response_code(404);
            echo "Film introuvable";
            return;
        }

        require __DIR__ . '/../Views/films/edit.php';
    }

    public function update(int $id): void
    {
        $this->requireAuth();

        Film::update($id, [
            'titre'       => $_POST['titre'],
            'realisateur' => $_POST['realisateur'],
            'annee'       => $_POST['annee'],
            'duree'       => $_POST['duree'],
            'synopsis'    => $_POST['synopsis'],
        ]);

        header("Location: /films/{$id}");
        exit;
    }

    public function destroy(int $id): void
    {
        $this->requireAuth();

        Film::delete($id);

        header('Location: /films');
        exit;
    }
}
