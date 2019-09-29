<?php 

$title = 'Article';


ob_start();

?>

<div id="content_article">
	<div id="background_article">
		<header id="header_article">
			<h1>Page des articles</h1>
			<p>Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri</p>
		</header>

		<section id="section_article">
			<article>
				


			</article>


		</section>
	</div>
</div>







<?php

$content = ob_get_clean();
require('templateFrontend.php')

?>