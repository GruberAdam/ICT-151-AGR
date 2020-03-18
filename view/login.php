<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0 
    Project : Insert Project Name
*/

$_GET["action"] = "login";
// tampon de flux stocké en mémoire
ob_start(); // Ouvre la memoire tampon
$titre = "Rent A Snow - Acceuil";

?>
    <form action="index.php?action=login" method="post">
        <?php if (@$_GET['login-error']) : ?>
            <div class="alert alert-error" role="alert">
                <h4 class="alert-heading">Erreur !</h4>
                <p>Le pseudo entré / mot de passe contient une erreur </p>
            </div>
        <?php endif; ?>

        <!-- Display a success if the account was added to database -->
        <?php if (@$_GET['login-success']) : ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Réussite !</h4>
                <p>Vous êtes bien connecté</p>
                <hr>
                <div class="alert alert-success" role="alert">
                    Revenir a la page <a href="index.php?action=home" class="">d'acceuil</a>.
                </div>
            </div>
        <?php endif; ?>
        <label for="user_login_email">Pseudo</label>
        <input type="email" name="user_login_email" id="user_login_email" required>
        <label for="user_login_password">Mot de passe</label>
        <input type="password" name="user_login_password" id="user_login_password" required>
        <br>
        <input type="submit" value="Valider">
    </form>
    <button><a href="index.php?action=register">Create an account</a></button>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>