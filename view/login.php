<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0 
    Project : Insert Project Name
*/

$_GET["action"] = "login";
// tampon de flux stocké en mémoire
ob_start(); // Ouvre la memoire tampon
$titre = "Rent A Snow - Acceuil"
?>
    <form action="index.php?action=login" method="post">
        <label for="user_email">E-mail</label>
        <input type="email" name="user_email" id="user_email" required>
        <label for="user_password">Mot de passe</label>
        <input type="password" name="user_password" id="user_password" required>
        <br>
        <input type="submit">
    </form>
    <button><a href="index.php?action=register">Create an account</a></button>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>