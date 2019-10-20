<?php


$title = "Votre compte";

ob_start()

?>
<div id="content_account">
	<div class="text-center d-flex justify-content-center">
		<form method="post">
			<button id="form_delete"> Supp</button>
		</form>
	</div>
</div>



<?php

$content = ob_get_clean();
$script = '<script type="text/javascript" src="Public/Js/confirm_delete.js"></script>';

require('templateFrontend.php');

?>