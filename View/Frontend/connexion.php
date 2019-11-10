<?php

$title = "Connexion";
$metaDescription = "Tapez vos identifiants pour vous connecter";
$ogUrl = "https://jeanforterocheleblog.com/index.php?action=login";
$ogTitle = "Connexion";
$ogDescription = "Tapez vos identifiants pour vous connecter";

ob_start();

?>

<div id="background_login">
	<section id="section_login">

    <div class="container bg-secondary">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 login-content pb-5 px-5">
                <form id="form-login" action="index.php?action=login" method="post">
                    <div class="form-group mt-5">
                        <?php if ($error) { ?>
                            <p class="text-center text-danger mt-3">Mauvais identifiant ou mot de passe. Veuillez réessayer à nouveau.</p>
                        <?php } ?>
                        <label for="pseudo" class="text-white">Identifiant</label><br />
                        <input type="text" value="" class="form-control" name="pseudo" id="pseudo" placeholder="Veuillez saisir votre identifiant" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Mot de passe</label>
                        <input type="password" value="" class="form-control" name="password" id="password" placeholder="Veuillez saisir votre mot de passe" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-light mt-3 float-none float-md-right">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
</div>

<?php

$content = ob_get_clean();
$script = '<script src="public/js/login.js"></script>';
require('templateFrontend.php');


?>