<?php require 'View/includes/header.php'; ?>

<section>
    <br>
    <h2>Choose an author:</h2><br>
    <ul>
        <?php foreach ($authors as $author): ?>
            <li><a href="index.php?page=articles-by-author&author=<?= urlencode($author) ?>"><?= $author ?></a></li><br>
        <?php endforeach; ?>
    </ul>

    <?php if (isset($_GET['author'])): ?>
        <?php $selectedAuthor = $_GET['author']; ?>
        <?php if (!empty($articlesByAuthor)): ?>
            <h2>Articles by <?= $selectedAuthor ?>:</h2><br>
            <ul>
                <?php foreach ($articlesByAuthor as $article): ?>
                    <li>
                        <h3><?= $article->getTitle() ?></h3>
                        <p><?= $article->description ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</section>

<?php require 'View/includes/footer.php'; ?>
