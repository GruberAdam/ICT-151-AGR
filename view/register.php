<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0 
    Project : Insert Project Name
*/

$_GET["action"] = "register";

ob_start();
?>

    <!-- REGISTER FORM -->
    <form action="index.php?action=register" method="post">
        <label for="user_register_firstname">Prénom</label>
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
