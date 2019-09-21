<?php

$title = "Accueil";




ob_start();
?>
	
<div class="content_home">
	<div class="content_slider">
		<img class="img_slider"	src="Public/Img/te.jpg" />
	</div>
</div>




<?php

$content = ob_get_clean();
require('templateFrontend.php');

?>


