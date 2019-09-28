<?php

$title = "Accueil";




ob_start();
?>
	
<div class="content_home">
	<div id="article" class="d-flex justify-content-center">
		<div id="content_article" class="col-md-11">
			<div id="message_presentation">
				<h1>Bonjour</h1>
				<p>Para</p>

			</div>
			<article id="view_article" class="d-flex align-items-center justify-content-center">
				<div id="rendu_article" class="col-md-9 text-white">
					<div id="test">
						<h3><?php ?>Zouglou</h3> </br>
						<p id="article_text"><?php ?>Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p></br>
						<p id="info_article">Par : <?php ?> le : <?php ?></p>
					</div>
					<div id="test2">
						<h3><?php ?>Zouglou</h3> </br>
						<p id="article_text"><?php ?></p>Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p></br>
						<p id="info_article">Par : <?php ?> le : <?php ?></p>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require('templateFrontend.php');

?>


