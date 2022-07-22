<?php
ob_start();
?>
    <div class="h1 text-danger">Page not found</div>
<?php
$content = ob_get_clean();
$titre = "Accueil";
require "template.php";
?>
