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
<?php if (@!$_SESSION['admin']) : ?>
    <?php foreach ($snows as $snow) : ?>

        <span id="snows-container">
        <a href="index.php?action=displayASnow&code=<?= $snow['code'] ?>">
            <div style="font-size: 25px; color: #0e90d2; margin-top: 5px; display: inline-block; width: 300px; border: 5px outset orange;">
                <img src="<?= $snow['photo'] ?>">
                <div style="margin-top: 50px">Model : <?= $snow['model'] ?></div>
                <div style="margin-top: 5px">Brand : <?= $snow['brand'] ?></div>
                <div style="margin-top: 5px; margin-bottom: 10px">Snow length : <?= $snow['snowLength'] ?></div>
                <a class="btn btn-primary" href="#" role="button" style="padding: 10px">Ajouter au panier</a>
            </div>
        </a>
    </span>
    <?php endforeach; ?>
<?php else: ?>
    <div id="set-overlay"></div>
    <table style="width: 100%; border: 1px solid black;">
        <tr style="text-align: left; border: 1px solid black;">
            <th>ID</th>
            <th>Code</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Longeur</th>
            <th>Prix</th>
            <th>Disponibilité</th>
            <th>Photo</th>
        </tr>

        <!-- TABLE -->
        <?php foreach ($snows as $snow) : ?>
            <tr style="border: 1px solid black;">
                <td style="padding-left: 5px; font-weight: bold"><?= $snow['id'] ?></td>
                <td><a href="index.php?action=displayASnow&code=<?= $snow['code'] ?>"><?= $snow['code'] ?></a></td>
                <td><?= $snow['brand'] ?></td>
                <td><?= $snow['model'] ?></td>
                <td><?= $snow['snowLength'] ?></td>
                <td><?= $snow['dailyPrice'] ?></td>
                <td><?= $snow['qtyAvailable'] ?></td>
                <td><img src="<?= $snow['photo'] ?>" style="width: 50px"></td>
                <td></td>
            </tr>
        <?php endforeach ?>
    </table>
    <!-- ADD FORM -->
    <div id="dialog-window_add" style="display: none" class="dialog-window">
        <a class="btn btn-danger" role="button" style="float: right" id="button-exit-add">Quitter</a>
        <div class="form-group col-md-4">
            <form method="post" action="index.php?action=modifySnow&type=add">
                <label for="add_code">Code</label>
                <input type="text" maxlength="4" id="add_code" name="modify_code">
                <label for="add_brand">Marque</label>
                <input type="text" name="modify_brand" id="add_brand">
                <label for="add_model">Modèle</label>
                <input id="add_model" type="text" name="modify_model">
                <label for="add_length">Longeur</label>
                <input type="number" id="add_length" name="modify_length">
                <label for="add_price">Prix</label>
                <input type="number" id="add_price" name="modify_price">
                <label for="add_schedule">Disponibilité</label>
                <input type="number" id="add_schedule" name="modify_schedule">
                <label for="add_schedule">Actif</label>
                <select name="modify_active" class="form-control" id="add_active">
                    <option>oui</option>
                    <option>non</option>
                    <label for="add_image">Image</label>
                    <input type="file" id="add_image" name="modify_img" accept="image/*">
                    <input type="submit" id="submit_add_snow_from" class="btn btn-success" value="Valider">
                    <textarea id="add_description" name="modify_description" cols="20" rows="3">Ecrivez une déscription du snow</textarea>
            </form>
        </div>
    </div>
    <!-- MODIFY FORM -->

    <div id="dialog-window_modify" class="dialog-window" style="display: none">
        <form method="post" action="index.php?action=modifySnow&type=modify">
            <a class="btn btn-danger" role="button" style="float: right" id="button-exit-modifications">Quitter</a>
            <div class="form-group col-md-4">
                <label for="inputState">ID</label>
                <select id="inputState" class="form-control" name="modify_id">
                    <option>Selectionnez un ID</option>
                    <?php foreach ($snows as $snow) : ?>
                        <option><?= $snow['id'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Code</label>
                <input type="text" id="input_modify_code" name="modify_code">
            </div>
            <div class="form-group col-md-4">
                <label>Marque</label>
                <input type="text" id="input_modify_brand" name="modify_brand">
            </div>
            <div class="form-group col-md-4">
                <label>Modèle</label>
                <input type="text" id="input_modify_model" name="modify_model">
            </div>
            <div class="form-group col-md-4">
                <label>Longeur</label>
                <input type="text" id="input_modify_length" name="modify_length">
            </div>
            <div class="form-group col-md-4">
                <label>Disponibilté</label>
                <input type="text" id="input_modify_schedule" name="modify_schedule">
            </div>
            <div class="form-group col-md-4">
                <label>Prix</label>
                <input type="text" id="input_modify_price" name="modify_price">
            </div>
            <div class="form-group col-md-4">
                <label>Actif</label>
                <input type="text" id="input_modify_active" name="modify_active">
            </div>
            <label for="add_image">Image</label>
            <img id="snow_modify_display">
            <input type="file" id="modify_image" name="modify_img" accept="image/*" onchange="changeImg(value)">
            <textarea id="input_modify_description" name="modify_description" cols="20" rows="3"></textarea>
            <input type="submit" id="submit_modify_snow_form" class="btn btn-success">
        </form>
        <form method="post" action="index.php?action=modifySnow&type=delete">
            <input type="hidden" name="modify_id" id="input_delete_id">
            <input type="submit" id="submit_delete_snow_form" class="btn btn-danger" value="Delete">
        </form>

    </div>

    <a class="btn btn-success" href="#" role="button" style="padding: 10px; margin-top: 10px"
       id="button-snow_add">Ajouter</a>
    <a class="btn btn-info button-snow_modifications" href="#" role="button" style="padding: 10px; margin-top: 10px">Modifier
        un snow</a>
<?php endif;
?>

    <script src="js/snowManagement.js" type="text/javascript" rel="script"></script>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>