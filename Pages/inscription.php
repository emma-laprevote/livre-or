<?php
$msg_error = "";
    require_once('../php/functions.php');
    $bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');

    if(isset($_POST['envoyer']))
    {

        $msg_error = insertInscription();
    }

    $root_images = '../';
    $root_profil = '';
    $root_inscription = '';
    $root_connexion = '';
    $root_livreor = '';
    $root_index = '../';
    $root_css = '../';
    $root_js = '../';
?>


<?php $title = 'INSCRIPTION'; ?>

<?php ob_start(); ?>

<?php require_once('../php/header.php'); ?>

<main id="formuInscription">

<h1 class="titleInscription">INSCRIPTION</h1>

<p class="sloganInscri" class="flow-text">Rejoins la communauté Noisy,<br>
    partage ton avis sur les concerts qui t'ont le plus marqués.<br>

    <form class="col s12" method="POST" action="inscription.php">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="login" type="text" name="login" class="validate" required>
          <label for="login">Nom d'utilisateur</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" name="password" class="validate" required>
          <label for="password">Password</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="confirm_password" type="password" name="confirm_password" class="validate" required>
          <label for="confirm_password">Conformation password</label>
        </div>
        <button class="btn waves-effect #ef6c00 orange darken-3" type="submit" name="envoyer">Envoyer
            <i class="material-icons right">send</i>
        </button>
        <?php if($msg_error != ""){echo "<p>$msg_error</p>";}?>
      </div>
    </form>
 
</main>

<?php require_once('../php/footer.php'); ?>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('../php/template.php'); ?>