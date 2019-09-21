<?php 

$title = 'Biographie';


ob_start();

?>

<p>Page bigraphie</p>


<?php

$content = ob_get_clean();
require('templateFrontend.php')

?>