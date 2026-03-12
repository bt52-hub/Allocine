<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allociné TP</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
    <script src="/js/script.js" defer></script>

</head>

<body>

    <!-- HEADER -->
    <header class="site-header">

        <nav class="main-nav container">

            <div class="logo">
                <img src="/assets/icons/logo-allocine_pop-corn.svg" class="logo-icon">
                <a href="/" id="logo-text">Allociné</a>
            </div>

            <button class="burger" id="burger" aria-label="menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul id="menu" class="menu">
                <?php if (isset($_SESSION['user'])): ?>
                    <li><span class="nav-pseudo">🍿 Bonjour, <?= htmlspecialchars($_SESSION['user']['pseudo']) ?></span></li>
                    <li><a href="/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="/login">Connexion</a></li>
                    <li><a href="/register">Inscription</a></li>
                <?php endif; ?>
            </ul>

        </nav>

    </header>

    <main class="container">

        <main class="container">