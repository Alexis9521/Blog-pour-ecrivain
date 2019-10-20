<?php

$title = "Espace d'administration";

ob_start()

?>
<header id="header_admin">
	
</header>
<section id="section_admin">
	
</section>


<?php


$content = ob_get_clean();
require('templateFrontend.php');

?>
