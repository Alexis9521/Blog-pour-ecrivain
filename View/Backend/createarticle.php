<?php 

$title = "Création d'article";
$metaDescription = "Depuis cette page vous pourrez créer de nouveaux articles";
$ogUrl = "https://jeanforterocheleblog.com/index.php?action=createarticle";
$ogTitle = "Création d'article";
$ogDescription = "Depuis cette page vous pourrez créer de nouveaux articles";

ob_start();

?>
<section id="create_article">
    <div class="container">

        <h1 class="text-center">Ajouter un nouvel article</h1>
        <?php if ($error) {
            echo $error;
        }
        ?>
        <form id="form-article" action="index.php?action=newArticle" method="post">
            <div class="form-group">
                <label for="title">Titre</label><br />
                <input type="text" class="form-control" name="title" id="title" placeholder="Saisissez votre titre ici"/><br />
            </div>
            <div class="form-group">
                <label for="text">Texte</label><br />
                <textarea name="text" class="form-control" id="text" rows="10" placeholder="Saisissez votre texte ici"></textarea><br />
            </div>
            <button type="submit" name="submit" class="btn btn-secondary offset-10 mb-4">Publier en ligne</button>
        </form>
    </div>
</section>

<?php 

$content = ob_get_clean();
require('backendtemplate.php');

?>