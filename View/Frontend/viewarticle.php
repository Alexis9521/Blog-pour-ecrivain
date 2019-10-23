<?php


$title = $article->getTitle();

ob_start();


?>
<header id="header_viewarticle">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<nav>
					<ul>
						<li>Modifier l'article</li>
					</ul>
				</nav>
				<h1 class="text-center"> Billets simple pour l'alaska.</h1>
				<h2 class="text-center"><?= $article->getTitle(); ?></h2>
			</div>
		</div>
	</div>
</header>

<article>
	<div class="col-10 container-fluid">
		<div class="row">
			<div class="col-9 offset-1 mb-5 mt-5">
				<p><?= $article->getTitle(); ?></p>
				<p><?= $article->getContent(); ?></p>
			</div>
		</div>
	</div>
</article>



<section id="comment" class="bg-secondary">

	<?php // Ajoute les differentes fonction pour la vue et l'ajout des commentaires ?>
	
</section>


<?php

$content = ob_get_clean();
require('templateFrontend.php');
?>