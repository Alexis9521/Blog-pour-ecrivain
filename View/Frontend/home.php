<?php

$title = "Accueil";




ob_start();
?>
	
<div class="content_home">
	<div id="article">
		<article id="content_article">
			<h3><?= ?></h3>
			<p id="article_text"><?= ?></p>
			
		</article>
	</div>
</div>

<?php

$content = ob_get_clean();
require('templateFrontend.php');

?>


