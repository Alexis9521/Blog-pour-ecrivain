<?php

$title = "Accueil";
$metaDescription = "Bienvenue sur le blog de Jean Forteroche un blog pour écrivain";
$ogUrl = "https://jeanforterocheleblog.com/";
$ogTitle = "Accueil";
$ogDescription = "Bienvenue sur le blog de Jean Forteroche un blog pour écrivain";

ob_start();
?>

<div id="content_home">
	<div class="col-12 d-flex justify-content-center">
		<div id="background_home"  class="col-10">
			<header id="header_home">
				<div class="container">
					<div class="row">
						<div id="title_home" class="text-white text-center">

							<h1>Bonjour bienvenue sur le blog de Jean Forteroche !</h1>
							<p>Sur ce blog pour écrivain vous pourrez trouvez les articles les commentaires de la communauté et je l'èspère voir l'avancé de mon roman en direct. Bonne lecture à vous tous et partager au max.</p>

						</div>
					</div>
				</div>
			</header>

			<section id="section_home">
				<div class="container">
					<div class="row">
						<div id="content_section_home" class="text-center text-white">
							
							<img id="img1" class="img-responsive col-5" src="Public/Img/img_roman.jpg">
							<h2>Le choix du roman en ligne</h2>
							<p>Pourquoi le roman en ligne ? Choix judicieux non ?</p>
							<p>Ceci permet de partager l'avancé de mon roman et de recevoir l'avis de la communauté vous pourrez partager votre impression et vos avis sur chaque article de mon livre.</p>

						</div>
					</div>
				</div>
			</section>

			<section id="section_home2">
				<div class="container">
					<div class="row">
						<div class="text-center text-white">
							<img id="img2" class="img-responsive col-5" src="Public/Img/image_roman2.jpg">
							<h2>Consulter mes articles</h2>
							<p>Mon roman sera découpé en plusieurs article je vous invite donc à tous les consulter à poster un petit commentaire l'avis de la communauté m'importe beaucoup et m'aidera à avancer sur mon projet. Je suis sur que cela va vous plaire ben oui c'est quand même moi qui est écrit tous ça. Sur ce bonne lecture.</p>
							<a  class="col-md-2 btn btn-light mb-5" href="index.php?action=article" title="Page article">Consulter nos articles</a>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require('templateFrontend.php');

?>


