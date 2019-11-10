<?php

$title = $article->getTitle();
$metaDescription = "Visionné chaque article";
$ogUrl = "https://jeanforterocheleblog.com/index.php?action=viewarticle";
$ogTitle = $article->getTitle();
$ogDescription = "Visionné chaque article";

ob_start();


?>
<header id="header_viewarticle">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1 class="text-center"> Billets simple pour l'alaska.</h1>
				<h2 class="text-center"><?= $article->getTitle(); ?></h2>
			</div>
		</div>
	</div>
</header>

<section>
    <article>
    	<div class="col-10 container-fluid">
    		<div class="row">
    			<div id="render_article" class="col-8 offset-2 mb-5 mt-5">
    				<p><?= $article->getContent(); ?></p>
    				<p class="offset-8">Créer le <?= $article->getCreation_date(); ?></p>
    			</div>
    		</div>
    	</div>
    </article>
</section>

<section id="comments">
    <div class="container-fluid bg-secondary">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5 mt-5">
                <h5 class="text-center mt-4 mb-5 text-white">Commentaires</h5>
                <?php if (empty($comments)) { ?><p class="text-center text-white">Pas de commentaires à afficher. Laissez le vôtre !</p><?php } ?>
                <?php foreach ($comments as $comment) { ?>
                    <div class="comment <?php if ($comment->getReport() > 0) { ?> reported<?php } ?>">
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <p id="comment<?= $comment->getId() ?>" class="mt-3 ml-5"><span id="pseudo-comment" class="font-weight-bold"><?= $comment->getPseudo() ?></span> - Publié le <?= date_format(date_create($comment->getComment_date()), 'd/m/Y à H:i:s') ?></p>
                            </div>
                            <div class="col-md-9">
                                <p id="comment-content" class="mt-3 ml-5 mr-5"> <?= $comment->getComment() ?> </p>
                            </div>
                            <div class="col-2 col-sm-3 col-md-2 ml-5 ml-sm-auto offset-sm-8 offset-md-10 mt-2">
                            	<a href="index.php?action=viewarticle&comment=<?= $comment->getId() ?>&article=<?= $comment->getArticle_id() ?>&event=report" class="btn btn-danger btn-sm mr-5 mb-2<?php if ($comment->getReport() > 0) { ?> disabled" aria-disabled="true" <?php } ?> role="button"><?php if ($comment->getReport() > 0) { ?> Signalé <?php } else { ?> Signaler <?php } ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section id="comment-form">
    <div class="container-fluid bg-secondary">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5 mt-5">
                <h5 class="text-center mt-4 mb-5 text-white">Laisser un commentaire</h5>
                <?php if(isset($_SESSION['id'])){ ?>
                        <form id="form-comment" action="index.php?action=viewarticle&id=<?= $article->getId(); ?>" method="post">
                            <div class="form-group">
                                <label for="form-comment" class="text-white mt-2">Votre commentaire</label>
                                <textarea class="form-control" name="comments" id="form-comment" rows="3" placeholder="Commentaire"></textarea>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-dark mt-4 px-4">Envoyer</button>
                            </div>
                        </form>
                    <?php }else{ ?>
                        <p class="text-white text-center">Pour poster un commentaire vous devez être <a href="index.php?action=login" class="text-white text-uppercase font-italic">connecté</a></p>
                    <?php }
                ?>


            </div>
        </div>
    </div>
</section>


<?php

$content = ob_get_clean();
require('templateFrontend.php');
?>