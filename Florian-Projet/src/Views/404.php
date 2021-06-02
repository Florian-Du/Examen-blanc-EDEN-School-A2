<?php
ob_start();

?>

<section class="error">
    <h2>Erreur 404</h2>
    <p>La page rechercher n'existe pas ! <a href="/">Quitter cette page !</a></p>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
