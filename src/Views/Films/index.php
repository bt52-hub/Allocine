<body>
    <?php require __DIR__ . '/../layout/header.php'; ?>

    <section class="container">
        <h1>Liste des films</h1>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="/films/create" class="button-add-film">+ Ajouter un film</a>
        <?php endif; ?>

        <div class="film-grid">

            <?php foreach ($films as $film): ?>

                <div class="film-card">
                    <a href="/films/<?= $film['id'] ?>" class="film-link">
                        <img class="film-poster"
                            src="/assets/images/films/<?= htmlspecialchars($film['affiche'] ?? 'default.jpg') ?>"
                            alt="<?= htmlspecialchars($film['titre']) ?>">
                    </a>

                    <div class="film-card-body">
                        <a href="/films/<?= $film['id'] ?>">
                            <h3><?= htmlspecialchars($film['titre']) ?></h3>
                            <p><?= htmlspecialchars($film['synopsis']) ?></p>
                        </a>

                        <?php if (isset($_SESSION['user'])): ?>
                            <div class="film-actions">
                                <a href="/films/<?= $film['id'] ?>/edit" class="button">Modifier</a>

                                <form method="POST" action="/films/<?= $film['id'] ?>/delete" style="display:inline;">
                                    <button type="submit"
                                        class="button button-danger"
                                        onclick="return confirm('Supprimer ce film ?')">Supprimer</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </section>

    <?php require __DIR__ . '/../layout/footer.php'; ?>
</body>