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
		<link rel="stylesheet" type="text/css" href="Public/Css/style.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
	</head>

	<body>
		<div id="bloc_page">
			<header>
				<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top col-md-12">
					<div class="col-md-12 d-flex align-items-center">
						<a class="navbar-brand text-white " href="index.php?action=home">Jean</a>
						<ul id="rend_link" class="d-flex col-md-11">
							<div id="nav_link"class=" col-md-2 d-flex justify-content-center offset-5">
								<li class="nav-item"><a class="nav-link text-white" href="index.php?action=home">Accueil</a></li>
								<li class="nav-item"><a class="nav-link text-white" href="index.php?action=article">Article</a></li>
							</div>

							<?php if(isset($_SESSION['id']))
							{ ?>
								<div class="d-flex offset-3">
								
									<p id="pseudo" class="text-white d-flex	align-items-center"><?php echo $_SESSION['pseudo']; ?></p>
									<li class="nav_item"><a title="Compte" id="account_link" class="nav-link text-white" href="index.php?action=account"><i class="far fa-user"></i></a></li>
									<li class="nav-item"><a  id="logout_link" class="nav-link text-white" href="index.php?action=deconnexion">Déconnexion</a></li>
								<?php if($_SESSION['role'] > 1){ ?>
									<li class="nav-item"><a  class="nav-link text-white" href="index.php?action=admin">Admin</a></li>
								<?php } ?>
								</div>
							<?php }else{ ?>
								<div class="d-flex offset-3">
									<li class="nav-item"><a id="inscription_link" class="nav-link text-white" href="index.php?action=inscription">Inscription</a></li>
									<li class="nav-item"><a id="connexion_link" class="nav-link text-white" href="index.php?action=login">Connexion</a></li>
								</div>
							<?php }
							?>
						</ul>
					</div>
				</nav>
			</header>

			<?= $content ?>
			
			<footer>
				<div class="containt">
					<div class="bg-dark d-flex col-md-12">
						<div id="footer_one" class="text-center offset-4 col-md-2 d-flex flex-column">

							<h5 class="text-white text-uppercase">Le blog</h5>
							<a class="text-white" href="index.php?action=home">Accueil</a></li>
							<a class="text-white" href="index.php?action=biography">Biographie</a></li>
							<a class="text-white" href="index.php?action=contact">Contact</a></li>
							<a class="text-white" href="index.php?action=login">Connexion</a></li>

						</div>

						<div id="footer_two" class="text-center col-md-2 d-flex flex-column">

							<h5 class="text-white text-uppercase">Plus d'infos</h5>
							<a class="text-white" href="index.php?action=">CGU</a></li>
							<a class="text-white" href="index.php?action=">Politique de confidentialité</a></li>

						</div>
					</div>
				</div>
			</footer>
		</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<?php if(!empty($script))
	{
		echo $script;
	} ?>
	</body>

</html>