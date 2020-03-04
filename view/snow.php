<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0
    Project : Insert Project Name
*/
// tampon de flux stocké en mémoire
ob_start(); // Ouvre la memoire tampon
$titre = "Rent A Snow - Produits";
?>

<p>Bonjour</p>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>