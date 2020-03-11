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
<h1>Voici le snow</h1>

<?php foreach ($snow as $item) :?>

    <span id="snows-container">
            <div>
                <img src="<?= $item['photo'] ?>">
                <div style="padding: 15px; font-size: 30px">Model : <?= $item['model'] ?></div>
                <div style="padding: 15px; font-size: 30px">Brand : <?= $item['brand'] ?></div>
                <div style="padding: 15px; font-size: 30px">Snow length : <?= $item['snowLength'] ?></div>
                <div style="padding: 15px; font-size: 30px">Prix : <?= $item['dailyPrice'] ?>frs</div>

                <div id="description" style="margin-left: 15px">
                    <p><?= $item['description'] ?></p>
                </div>
                <a class="btn btn-primary" href="#" role="button" style="padding: 15px; margin-left: 15px">Ajouter au panier</a>
            </div>
    </span>
<?php endforeach; ?>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>