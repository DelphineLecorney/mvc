<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here

?>

<section>
    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>
    
    <?php if ($article->imageUrl !== null): ?>
        <img src="<?= $article->imageUrl ?>" alt="Image" width="100" height="100">
    <?php else: ?>
        <p>Image not available</p>
    <?php endif; ?>

    <div>
        <?php if ($previousArticle): ?>
            <a href="index.php?page=articles-show&id=<?= $previousArticle->id ?>">Previous article</a>
        <?php endif; ?>

        <?php if ($nextArticle): ?>
            <a href="index.php?page=articles-show&id=<?= $nextArticle->id ?>">Next article</a>
        <?php endif; ?>
    </div>
</section>


<?php require 'View/includes/footer.php'?>