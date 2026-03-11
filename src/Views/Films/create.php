<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="auth-container">
    <h1>Ajouter un film</h1>

    <form class="form" method="POST" action="/films">

        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="titre" required>
        </div>

        <div class="form-group">
            <label>Réalisateur</label>
            <input type="text" name="realisateur">
        </div>

        <div class="form-group">
            <label>Année</label>
            <input type="number" name="annee">
        </div>

        <div class="form-group">
            <label>Durée (min)</label>
            <input type="number" name="duree">
        </div>

        <div class="form-group">
            <label>Synopsis</label>
            <textarea name="synopsis" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label>Affiche (nom du fichier)</label>
            <input type="text" name="affiche" placeholder="ex: mon_film.jpg">
        </div>

        <button type="submit" class="button">Ajouter</button>
        <a href="/films" class="btn-back">← Annuler</a>

    </form>
</div>