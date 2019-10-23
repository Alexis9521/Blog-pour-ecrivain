<?php 

$title = 'Article';

ob_start();

?>

<div id="content_article">
	<div id="background_article">
		<header id="header_article">
			<div id="nav_admin">
				<div class="row">
					<div class="col-lg-12">
						<nav>
							
						</nav>
					</div>
				</div>
			</div>

			<h1>Page des articles</h1>
			<p>Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri</p>
		</header>

		<section id="section_article">
			<div class="container bg-white">
				<div class="row">
					<div class="col-md-10">
						<?php foreach ($article as $articles){ ?>
							<article class="mb-5 mt-5 offset-1">
		                        <h3><?= $articles->getTitle(); ?></h3>
		                        <p>Publié le <?= date_format(date_create($articles->getCreation_date()), 'd/m/y');  ?></p>
		                        <div class="text-justify"><?= substr($articles->getContent(), 0, 250); ?>[...]</div>
		                        <a href="index.php?action=viewarticle&id=<?= $articles->getId(); ?>" title="Lire la suite de l'article" class="btn btn-primary mb-2" role="button">Lire la suite</a>
								<?php if(isset($_SESSION['role'] > 1)) { ?>
			                        <a href="index.php?action=updatearticle&id=<?= $articles->getId(); ?>" title="Modifier l'article" class="btn btn-primary mb-2 offset-5" role="button">Modifier l'article</a>
			                        <a href="index.php?action=deletearticle&id=<?= $articles->getId(); ?>" title="Supprimer l'article" class="btn btn-danger mb-2" role="button">Supprimer l'article</a>
			                    <?php } ?>
		                        <hr>
                    		</article>
						<?php
						}
						?>
					</div>
				</div>	
			</div>
		</section>
	</div>
</div>

<?php

$content = ob_get_clean();
require('templateFrontend.php');

?>