<?php 

$title = 'Inscription';


ob_start();

?>

<form action="index.php?action=inscription">
				
	<label for="user_name">Votre pseudo</label>
	<input type="text" id="user_name "name="user_name" />

	<label for="user_email">Votre email</label>
	<input type="email"  id="user_email" name="user_email" />

	<label for="user_password">Votre mots de passe</label>
	<input type="password" id="user_password" name="user_password" />

	<label for="user_confirmpass" >Confirmation du mots de passe</label>
	<input type="password" id="user_confirmpass" name="user_confirmpass" />

	<button type="submit">Validez</button>

</form>

<?php

$content = ob_get_clean();
require('templateFrontend.php')

?>

