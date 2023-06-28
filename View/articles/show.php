<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here

?>

<section>
    <h1><?= $article->getAuthor() ?></h1><br>
    <p><?= $article->formatPublishDate() ?></p><br>
    <p><?= $article->description ?></p>

    
    <?php if ($article->imageUrl !== null): ?><br>
        <img src="<?= $article->imageUrl ?>" alt="Image" width="200" height="200">
    <?php else: ?>
        <p>Image not available</p>
    <?php endif; ?>

    <div><br>
        <?php if ($previousArticle): ?>
            <a href="index.php?page=articles-show&id=<?= $previousArticle->id ?>">Previous article</a>
        <?php endif; ?>

        <?php if ($nextArticle): ?>
            <a href="index.php?page=articles-show&id=<?= $nextArticle->id ?>">Next article</a>
        <?php endif; ?>
    </div>
</section>


<?php require 'View/includes/footer.php'?>