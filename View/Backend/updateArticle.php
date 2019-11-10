<?php

$title = "Modifier votre article";
$metaDescription = "Depuis cette page vous pourrez modifier vos articles";
$ogUrl = "https://jeanforterocheleblog.com/index.php?action=updateArticle";
$ogTitle = "Modifier votre article";
$ogDescription = "Depuis cette page vous pourrez modifier vos articles";

ob_start();
?>

<section id="section_updateArticle">
    <div class="container">

        <h1 id="update-article-title" class="text-center mb-5">Modifier un article</h1>
        <?php if ($error) {
            echo $error;
        }
        ?>
        <form id="form-article" action="index.php?action=updateArticle&id=<?= $article->getId() ?>" method="post">

            <div class="form-group">
                <label for="title">Titre <small id="pseudodHelpBlock" class="text-muted">(Privilégiez un titre court et pertinent)</small></label><br />
                <input type="text" class="form-control" name="title" id="title"value="<?= $article->getTitle() ?>"/><br />
            </div>

            <div class="form-group">
                <label for="text">Texte</label><br />
                <textarea name="text" class="form-control" id="text" rows="10"><?= $article->getContent() ?></textarea><br />
            </div>

            <button type="submit" name="submit" class="btn btn-secondary offset-10 mb-4">Publier en ligne</button>
        </form>
    </div>
</section>

<?php

$content = ob_get_clean();

require('backendtemplate.php');
?>