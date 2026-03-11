<?php

declare(strict_types=1);

define('BASE_URL', '/');

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\FilmController;
use App\Controllers\AuthController;

session_start();

$router = new Router();

// FILMS PUBLICS

$router->get('/', [FilmController::class, 'index']);
$router->get('/films', [FilmController::class, 'index']);
$router->get('/films/:id', [FilmController::class, 'show']);

// AUTH

$router->get('/register', [AuthController::class, 'registerForm']);
$router->post('/register', [AuthController::class, 'register']);

$router->get('/login', [AuthController::class, 'loginForm']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);

// AUTH - CRUD Films

$router->get('/films/create',       [FilmController::class, 'create']);
$router->post('/films',             [FilmController::class, 'store']);
$router->get('/films/:id/edit',     [FilmController::class, 'edit']);
$router->post('/films/:id/edit',    [FilmController::class, 'update']);
$router->post('/films/:id/delete',  [FilmController::class, 'destroy']);

$router->dispatch();

