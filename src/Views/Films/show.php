<?php
require __DIR__ . '/../layout/header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title><?= htmlspecialchars($film['titre']) ?></title>
</head>

<body>

    <div class="film-detail">

        <h1><?= htmlspecialchars($film['titre']) ?></h1>
        <section>
            <div><img class="film-poster"
                    src="/assets/images/films/<?= htmlspecialchars($film['affiche'] ?? 'default.jpg') ?>"></div>

            <div class="film-meta">

                <p><strong>Genre :</strong> <?= htmlspecialchars($film['genres']) ?></p>

                <p><strong>Année :</strong> <?= htmlspecialchars($film['annee']) ?></p>

            </div>
        </section>


        <p class="film-description">

            <?= htmlspecialchars($film['synopsis']) ?>

        </p>

        <span><a href="/films" class="btn-back">← Retour aux films</a></span>

    </div>

</body>

</html>