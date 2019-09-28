<?php

ob_start();
$title = 'Connexion'

?>
<div class="col-md-12">
	<div class="row">
		<div id="connexion_page" class="col-md-12 d-flex justify-content-center">
			<form id="form_connexion"  class="col-md-2" action="">
				<div class="d-flex justify-content-center"><!-- Voir comment améliorer  -->

					<h5 id="title_form_login">Saisissez vos identifiants</h5>

				</div>
				<div class="form-group offset-2">

					<label>Pseudo :</label></br>
					<input class="form_login" type="text" name="pseudo" /></br>
					<label>Mots de passe :</label></br>
					<input class="form_login" type="password" name="password"  /></br>
					<button  id="submit_login" class="form_login" type="submit" name="connexion" >Connexion</button></br>
					<a class="text-white text-uppercase center" href="index.php?action=inscription">Inscription</a>

				</div>
			</form>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require('templateFrontend.php');


?>