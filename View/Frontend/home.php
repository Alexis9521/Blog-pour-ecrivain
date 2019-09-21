<?php

$title = "Accueil";




ob_start();
?>

<img src="" />


<?php

$content = ob_get_clean();
require('templateFrontend.php');

?>


