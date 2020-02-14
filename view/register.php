<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0 
    Project : Insert Project Name
*/

$_GET["action"] = "register";

ob_start();
?>
<?php
    echo "ERROR : ". @$_GET['register-error'];
?>
    <!-- REGISTER FORM -->
    <form action="index.php?action=register" method="post">

        <!-- Display an error if email was already used -->
        <?php if (@$_GET['register-error']) : ?>
            <div class="alert alert-error" role="alert">
                <h4 class="alert-heading">Erreur !</h4>
                <p>Cet E-mail a déjà été utilisé </p>
            </div>
        <?php endif; ?>

        <!-- Display a success if the account was added to database -->
        <?php if (@$_GET['register-success']) : ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Réussite !</h4>
                <p>Le compte a bien été créer</p>
            </div>
        <?php endif; ?>

        <label for="user_register_firstname">Pseudo</label>
        <input type="text" id="user_register_firstname" name="user_register_firstname" required>
        <label for="user_register_email">E-mail</label>
        <input type="email" name="user_register_email" id="user_register_email" required>
        <label for="user_register_password">Mot de passe</label>
        <input type="password" name="user_register_password" id="user_register_password" required>
        <br>
        <input type="submit">
    </form>

<?php
$content = ob_get_clean();
require "gabarit.php";
