<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{

    public function loginForm(): void
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $token = $_SESSION['csrf_token'];

        require __DIR__ . '/../Views/auth/login.php';
    }

    public function login(): void
    {

        $erreurs = [];

        if (
            !isset($_POST['csrf_token']) ||
            $_POST['csrf_token'] !== $_SESSION['csrf_token']
        ) {
            $erreurs[] = "Formulaire invalide";
        }

        if (empty($_POST['email']) || empty($_POST['password'])) {
            $erreurs[] = "Tous les champs sont obligatoires";
        }

        if ($erreurs) {

            $_SESSION['flash'] = [
                'type' => 'erreur',
                'message' => implode(' ', $erreurs)
            ];

            header('Location: /login');
            exit;
        }

        unset($_SESSION['csrf_token']);

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {

            $_SESSION['flash'] = [
                'type' => 'erreur',
                'message' => "Email ou mot de passe incorrect"
            ];

            header('Location: /login');
            exit;
        }

        session_regenerate_id(true);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'pseudo' => $user['pseudo']
        ];

        $_SESSION['flash'] = [
            'type' => 'succes',
            'message' => "Connexion réussie"
        ];

        header('Location: /films');
        exit;
    }

    public function registerForm(): void
    {

        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $token = $_SESSION['csrf_token'];

        require __DIR__ . '/../Views/auth/register.php';
    }

    public function register(): void
    {

        if (
            !isset($_POST['csrf_token']) ||
            $_POST['csrf_token'] !== $_SESSION['csrf_token']
        ) {
            die("Formulaire invalide");
        }

        unset($_SESSION['csrf_token']);

        $email = $_POST['email'];
        $password = $_POST['password'];
        $pseudo = $_POST['pseudo'];

        // VÉRIFIER SI EMAIL EXISTANT
        if (User::findByEmail($email)) {
            $_SESSION['flash'] = [
                'type'    => 'erreur',
                'message' => "Cet email est déjà utilisé"
            ];
            header('Location: /register');
            exit;
        }

        User::create($email, $password, $pseudo);

        $_SESSION['flash'] = [
            'type' => 'succes',
            'message' => "Compte créé, vous pouvez vous connecter"
        ];

        header('Location: /login');
        exit;
    }

    public function logout(): void
    {

        session_destroy();

        header('Location: /films');
        exit;
    }
}
