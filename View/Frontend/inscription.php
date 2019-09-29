<?php 

$title = 'Inscription';


ob_start();

?>

<div class="col-md-12">
	<div class="row">
		<div id="inscription_form" class="col-md-12 d-flex justify-content-center">
			<form id="form_inscription" class="col-md-2"action="index.php?action=inscription">
				<div class="d-flex justify-content-center">
					<h5>Entrez les informations</h5>
				</div>
				<div class="offset-2">
							
					<label for="user_name">Votre pseudo :</label></br>
					<input class="form_login" type="text" id="user_name "name="user_name" /></br>

					<label for="user_email">Votre email :</label></br>
					<input class="form_login" type="email"  id="user_email" name="user_email" /></br>

					<label for="user_password">Votre mots de passe :</label></br>
					<input class="form_login" type="password" id="user_password" name="user_password" /></br>

					<label for="user_confirmpass" >Confirmation :</label></br>
					<input class="form_login" type="password" id="user_confirmpass" name="user_confirmpass" /></br>

					<button  id="submit_inscription" type="submit">Validez</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php

$content = ob_get_clean();
require('templateFrontend.php')

?>

