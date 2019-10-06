<?php 

$title = 'Inscription';

ob_start();

?>



<div class="col-md-12">
	<div class="row">
		<div id="inscription_form" class="col-md-12 d-flex justify-content-center">
			<form id="form_inscription" class="col-md-3"action="index.php?action=inscription" method="post">
				
				<p class="text-center text-danger"><?php if($error){ echo $error; } ?></p>

				<div class="d-flex justify-content-around">
					<div class="form-group">
						<label for="user_first_name">Votre prénom :</label></br>
						<input class="form_login" type="text" id="user_first_name "name="user_first_name" />
					</div>
					<div class="form-group">
						<label for="user_name">Votre nom</label></br>
						<input class="form_login" type="text"  id="user_name" name="user_name" /></br>
					</div>
				</div>
				
				<div class="d-flex justify-content-around">
					<div class="form-group">
						<label for="user_pseudo">Votre pseudo :</label></br>
						<input class="form_login" type="text" id="user_pseudo "name="user_pseudo" />
					</div>

					<div class="form-group">
						<label for="user_email">Votre email :</label></br>
						<input class="form_login" type="email"  id="user_email" name="user_email" />
					</div>
				</div>

				<div class="d-flex justify-content-around">
					<div class="form-group">
						<label for="user_password">Votre mots de passe :</label></br>
						<input class="form_login" type="password" id="user_password" name="user_password" />
					</div>

					<div class="form-group">
						<label for="user_confirmpass" >Confirmation :</label></br>
						<input class="form_login" type="password" id="user_confirmpass" name="user_confirmpass" />
					</div>
				</div>

				<div class="d-flex justify-content-center">
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

