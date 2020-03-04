<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0
    Project : Insert Project Name
*/
// tampon de flux stocké en mémoire
ob_start(); // Ouvre la memoire tampon
$titre = "Rent A Snow - Produits";

$index = 0;
?>

<?php foreach ($snows as $snow) : ?>
    <a href="index.php?action=displayASnow&code=<?=$snow['code']?>">
    <div style="font-size: 25px; color: #0e90d2; margin-top: 5px; display: inline-block; width: 300px; border: 5px outset orange;">
        <img src="<?= $snow['photo'] ?>">
        <div style="margin-top: 50px">Model : <?= $snow['model'] ?></div>
        <div style="margin-top: 5px">Brand : <?= $snow['brand'] ?></div>
        <div style="margin-top: 5px; margin-bottom: 10px">Snow length : <?= $snow['snowLength'] ?></div>
    </div>
    </a>
<?php endforeach; ?>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>