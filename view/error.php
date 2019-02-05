<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 12.05.2017
 * Time: 08:45
 */

// Tampon de flux stocké en mémoire
ob_start();
$titre = "erreur";
?>

<article>
  <header>
    <h2>Erreur</h2>
    <p>L'action demandée est inconnue !</p>
    <?=@$_SESSION['erreur'];?>
  </header>
</article>
<hr/>

<?php
  $contenu = ob_get_clean();
  require 'gabarit.php';