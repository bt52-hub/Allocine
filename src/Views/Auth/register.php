<?php
require __DIR__ . '/../layout/header.php';
?>

<div class="auth-container">

    <h1>Inscription</h1>

    <form class="form" method="POST" action="/register">

        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">

        <div class="form-group">
            <label>Pseudo</label>
            <input type="text" name="pseudo" placeholder="Votre pseudo" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="votre@email.com" required>
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit" class="button">Créer un compte</button>

        <p class="auth-link">Déjà un compte ? <a href="/login">Se connecter</a></p>

    </form>

</div>