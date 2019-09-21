<!DOCTYPE html>
<html lang="fr">
	<head>
		<title><?= $title ?></title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="Public/Css/style.css" />
	</head>

	<body>
		<header>
			<div class="row">
				<div class="col-md-1">
					<img id="logo" src="Public/Img/logo.png" />
				</div>

				<nav class="col-md-10">
					<ul class="offset-4">
						<li class="col-md-1 align-items"><a href="index.php?action=home">Accueil</a></li>
						<li class="col-md-1"><a href="index.php?action=biography">Biographie</a></li>
						<li class="col-md-1"><a href="index.php?action=contact">Contact</a></li>
						<li class="col-md-1"><a href="index.php?action=connection">Connexion</a></li>
					</ul>
				</nav>
			</div>
		</header>

	<?= $content ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

</html>