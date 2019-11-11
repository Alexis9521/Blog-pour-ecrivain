<?php 

$title = "Inscription";
$metaDescription = "Remplissez le formulaire";
$ogUrl = "https://jeanforterocheleblog.com/index.php?action=inscription";
$ogTitle = "Inscription";
$ogDescription = "Remplissez le formulaire";

ob_start();

?>


<div id="inscription_form">
	<header id="header_inscription" class="mb-3">
		<div class="container">
			<div class="row">
				<div class="text-white text-center col-12">
					<h1 class="text-uppercase text-center">Formulaire d'inscription</h1>
					<p>Veuillez remplir tous les champs demandés pour créer un compte et avoir accès à toutes les fonctionnaitées de notre blog</p>
				</div>
			</div>
		</div>
	</header>


	<section id="formul_inscription">
		<div id="form_inscrition" class="container bg-secondary">
			<div class="row">
				<div class="px-sm-5 px-lg-0 col-lg-10 offset-lg-1 mb-5 mt-5">
					<form id="form_inscription" action="index.php?action=inscription" method="post">
					
						<p class="text-center text-danger"><?php if($error){ echo $error; } ?></p>

						<div class="form-row">
							<div class="form-group col-lg-6 col-md-6">
								<label for="user_first_name">Votre prénom :</label>
								<input class="form-control" type="text" id="user_first_name "name="user_first_name" placeholder="Votre prénom" />
							</div>

							<div class="form-group col-lg-6 col-md-6">
								<label for="user_name">Votre nom :</label>
								<input class="form-control" type="text"  id="user_name" name="user_name" placeholder="Votre nom" />
							</div>
						</div>

						<div class="form-group">
							<label for="user_pseudo">Votre pseudo :</label>
							<input class="form-control" type="text" id="user_pseudo "name="user_pseudo" placeholder="Votre pseudo" />
						</div>

						<div class="form-group">
							<label for="user_email">Votre e-mail :</label>
							<input class="form-control" type="email"  id="user_email" name="user_email" placeholder="Votre e-mail" />
						</div>
						
						<div class="form-row">
							<div class="form-group col-lg-6 col-md-6">
								<label for="user_password">Votre mots de passe :</label>
								<input class="form-control" type="password" id="user_password" name="user_password" placeholder="Votre mots de passe" />
							</div>
							<div class="form-group col-lg-6 col-md-6">
								<label for="user_confirmpass" >Confirmation :</label>
								<input class="form-control" type="password" id="user_confirmpass" name="user_confirmpass" placeholder="Confirmation de votre mot de passe" />
							</div>
						</div>

						<button class="btn btn-light offset-mb-1 offset-5 mt-5 mb-4"type="submit">Validez</button>

					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php

$content = ob_get_clean();
$script = "<script src=Public/Js/inscription.js></script>";
require('templateFrontend.php');

?>

