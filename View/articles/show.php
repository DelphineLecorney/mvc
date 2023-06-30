<?php require 'View/includes/header.php'; ?>

<section>
    <h1><?= $article->getAuthor() ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>

    <?php if ($article->getImage() !== null): ?>
        <br>
        <img src="<?= $article->getImage() ?>" alt="Image">

    <?php else: ?>
        <p>Image not available</p>
    <?php endif; ?>

    <div><br>
        <?php if ($previousArticle): ?>
            <a href="index.php?page=articles-show&id=<?= $previousArticle->getId() ?>">Previous article</a>
        <?php endif; ?>

        <?php if ($nextArticle): ?>
            <a href="index.php?page=articles-show&id=<?= $nextArticle->getId() ?>">Next article</a>
        <?php endif; ?>
    </div>
    <br>

    <a href="index.php?page=articles-by-author&author=<?= urlencode($article->getAuthor()) ?>">
        More articles by the same author
    </a>
</section>

<?php require 'View/includes/footer.php'; ?>
