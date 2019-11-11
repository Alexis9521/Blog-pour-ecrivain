<?php

if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}

?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<title><?= $title ?></title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta property="og:url" content="<?= $ogUrl ?>" />
	    <meta property="og:type" content="website" />
	    <meta property="og:title" content="<?= $ogTitle ?>" />
	    <meta property="og:description" content="<?= htmlspecialchars($ogDescription) ?>" />
		<link rel="stylesheet" type="text/css" href="Public/Css/style.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151948614-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-151948614-1');
		</script>

	</head>

	<body>
		<div id="bloc_page">
			<nav class="navbar navbar-expand-md navbar-dark navbar-dark bg-dark fixed-top">
				<div class="container">
					<a class="navbar-brand text-white " title="Page d'acceuil" href="index.php?action=home">Jean Forteroche</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>

					<ul class="nav collapse navbar-collapse flex-md-row justify-content-md-end align-items-sm-start" id="navbarToggler">
			
						<li class="nav-item">
							<a class="nav-link text-white" title="Page d'accueil" href="index.php?action=home">Accueil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" title="Page d'article" href="index.php?action=article">Article</a>
						</li>
					
						<?php if(isset($_SESSION['id']))
						{ ?>

							<?php if($_SESSION['role'] > 1){ ?>
								<li class="nav-item"><a  class="nav-link text-white" title="Page d'administration" href="index.php?action=admin">Administration</a></li>
							<?php } ?>

							<li class="nav-item">
								<button type="button"  id="logout_link" class="btn btn-danger" title="Boutton déconnexion" data-toggle="modal" data-target="#deconnexion">Déconnexion</button>
							</li>

						<?php }else{ ?>

							<li class="nav-item mr-3">
								<a id="inscription_link" class="btn btn-secondary" title="Inscription" href="index.php?action=inscription">Inscription</a>
							</li>
							<li class="nav-item">
								<a id="connexion_link" class="btn btn-secondary" title="Login" href="index.php?action=login">Connexion</a>
							</li>

						<?php }
						?>

					</ul>
				</div>
			</nav>

			<!-- Modal pour la déconnexion -->

			<div class="modal fade" id="deconnexion" tabindex="-1" role="dialog" aria-labelledby="Boutton déconnexion" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="Boutton déconnexion">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteComment">Êtes-vous certain(e) de vouloir vous déconnecter ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <a href="index.php?action=deconnexion" title="Deconnexion" class="btn btn-danger">Déconnexion</a>
                        </div>
                    </div>
                </div>
            </div>
	
			<?= $content ?>
			
			<footer class="bg-dark">
				<div class="container-fluid">
					<div class="row">
						<div id="footer_one" class="col-sm mb-5 text-center">

							<h5 class="text-white text-uppercase">Le blog</h5>
							<br>
							<a class="text-white" title="Page d'accueil" href="index.php?action=home">Accueil</a></li>
							<br>
							<a class="text-white" title="Page d'article" href="index.php?action=article">Article</a></li>
							<br>
							<a class="text-white" title="Login" href="index.php?action=login">Connexion</a></li>
							<br>

						</div>
			
						<div id="footer_three" class="col-sm text-center">
							<h5 class="text-white text-uppercase">Administration</h5>
							<br>
							<a class="text-white" title="Login" href="index.php?action=login">Connexion</a></li>
							<br>
							<a class="text-white" title="Page administration" href="index.php?action=admin">Administration</a></li>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<script
		  src="https://code.jquery.com/jquery-3.4.1.js"
		  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		  crossorigin="anonymous"></script>
		 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<?php if(!empty($script))
		{
			echo $script;
		} ?>
	</body>
</html>