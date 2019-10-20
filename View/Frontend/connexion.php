<?php

ob_start();
$title = 'Connexion'

?>
<div class="col-md-12">
	<div class="row">
		<div id="connexion_page" class="col-md-12 d-flex justify-content-center">
			<form id="form_connexion"   class="col-md-2" action="" method="post">
				<div class="text-center">
					<p class="text-danger"><?php if($error){ echo $error; } ?></p>
				</div>

				<div id="log_page"class="d-flex flex-column justify-content">
					<label>Pseudo :</label></br>
					<input class="form_login" type="text" name="pseudo" />


					<label>Mots de passe :</label></br>
					<input class="form_login" type="password" name="password" />


				<button  id="submit_login" type="submit" name="connexion" >Connexion</button></br>
				<a id="link_inscritpion" class="text-white text-uppercase text-center" href="index.php?action=inscription">Inscription</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();
require('templateFrontend.php');


?>