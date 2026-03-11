<?php
require __DIR__ . '/../layout/header.php';
?>

<div class="auth-container">

    <h1>Connexion</h1>

    <?php if (isset($_SESSION['flash'])): ?>
        <p class="flash <?= htmlspecialchars($_SESSION['flash']['type']) ?>">
            <?= htmlspecialchars($_SESSION['flash']['message']) ?>
        </p>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <form class="form" method="POST" action="/login">

        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="votre@email.com" required>
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit" class="button">Connexion</button>

        <p class="auth-link">Pas encore de compte ? <a href="/register">S'inscrire</a></p>

    </form>

</div>