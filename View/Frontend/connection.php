<?php

ob_start();
$title = 'Connexion'

?>

<form action="">
	
	<h1>Saisissez vos identifiants</h1>
	<label>Pseudo</label><input type="text" name="pseudo" />
	<label>Mots de passe</label><input type="password" name="password"  />
	<input type="submit" name="connexion" value="Connexion" />
	<a href="index.php?action=inscription">Inscription</a>

</form>


<?php

$content = ob_get_clean();
require('templateFrontend.php');


?>