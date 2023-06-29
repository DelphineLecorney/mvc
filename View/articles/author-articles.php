<?php require 'View/includes/header.php'?>

<section>
    <h1>Articles by <?= $_GET['author'] ?></h1>
    <ul>
    <?php foreach ($articles as $article) : ?>
        <li>
            <a href="<?= $this->getUrl($article->getAuthor()) ?>">More articles by the same author
                <?= $article->getTitle() ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</section>

<?php require 'View/includes/footer.php'?>
