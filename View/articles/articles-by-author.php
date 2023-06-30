<?php require 'View/includes/header.php'; ?>

<section>
    <h1>Articles by <?= htmlspecialchars($_GET['author']) ?></h1>

    <ul>
        <?php foreach ($articlesByAuthor as $article): ?>
            <li>
                <a href="index.php?page=articles-show&id=<?= $article->articlesByAuthor() ?>">
                    <?= htmlspecialchars($article->getTitle() )?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'; ?>

