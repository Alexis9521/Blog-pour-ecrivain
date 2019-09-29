<?php

$title = "Accueil";




ob_start();
?>
<div id="content_home">
	<div id="background_home" class="col-md-10 offset-1">
		<header id="header_home">
			<div id="title_home" class="text-white text-center">

			<h1>Bonjour bienvenue sur le blog de Jean Forteroche !</h1>
			<p>Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri</p>

			</div>
		</header>

		<section id="section_home">
			<div id="content_section_home" class="d-flex text-white">
				<div id="img_one_home" class="offset-1">
					<img src="Public/Img/img_roman.jpg" />
				</div>
				<div class="text-center offset-3">
					<h2>Le choix du roman en ligne</h2>
					<p>Présentation</p>
				</div>
			</div>
		</section>
	</div>
</div>

<?php

$content = ob_get_clean();
require('templateFrontend.php');

?>


