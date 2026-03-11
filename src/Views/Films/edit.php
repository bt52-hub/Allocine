<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="auth-container">
    <h1>Modifier <?= htmlspecialchars($film['titre']) ?></h1>

    <form class="form" method="POST" action="/films/<?= $film['id'] ?>/edit">

        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="titre" value="<?= htmlspecialchars($film['titre']) ?>" required>
        </div>

        <div class="form-group">
            <label>Réalisateur</label>
            <input type="text" name="realisateur" value="<?= htmlspecialchars($film['realisateur'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Année</label>
            <input type="number" name="annee" value="<?= htmlspecialchars($film['annee'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Durée (min)</label>
            <input type="number" name="duree" value="<?= htmlspecialchars($film['duree'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Synopsis</label>
            <textarea name="synopsis" rows="4"><?= htmlspecialchars($film['synopsis'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="button">Enregistrer</button>
        <a href="/films/<?= $film['id'] ?>" class="btn-back">← Annuler</a>

    </form>
</div>