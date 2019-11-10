<?php 

$title = "Les articles";
$metaDescription = "Consulter tous nos articles";
$ogUrl = "https://jeanforterocheleblog.com/index.php?action=article";
$ogTitle = "Les articles";
$ogDescription = "Consulter tous nos articles";

ob_start();

?>


<header id="header_article">
	<div class="container-fluid">
		<div class="row">		
			<div class="text-center col-md-12">
				<h1>Page des articles</h1>
				<p>Voici tous nos articles bonne lecture</p>
			</div>
		</div>
	</div>
</header>

<section id="section_article">
	<div class="container bg-white">
		<div id="div_article" class="row">
			<div class="col-md-10">
				<?php foreach ($article as $articles){ ?>
					<article class="mb-5 mt-5 offset-1">
                        <h2><?= $articles->getTitle(); ?></h2>
                        <p>Publié le <?= date_format(date_create($articles->getCreation_date()), 'd/m/y');  ?></p>
                        <div class="text-justify"><?= substr($articles->getContent(), 0, 500); ?>[...]</div>
                        <a href="index.php?action=viewarticle&id=<?= $articles->getId(); ?>" title="Lire la suite de l'article" class="btn btn-secondary  mt-4 mb-2" role="button">Lire la suite</a>
                        <hr>
            		</article>
				<?php
				}
				?>
			</div>
		</div>	
	</div>
</section>


<?php

$content = ob_get_clean();
require('templateFrontend.php');

?>