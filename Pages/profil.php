<?php
session_start();
$msg_error = "";

  require_once('../php/functions.php');
    $bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');

    if(isset($_POST['envoyer']))
    {
        $msg_error = changeUser();
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

<?php $title = 'MON COMPTE'; ?>

<?php ob_start(); ?>

<?php require_once('../php/header.php'); ?>

<main id="formuInscription">

<h1 class="titleInscription">MON PROFIL</h1>

<p class="sloganInscri" class="flow-text">Modifie tes informations comme bon te semble.</p>

    <form class="col s12" method="POST" action="profil.php">
      <div class="row">
        <div class="input-field col6 s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="login" type="text" class="validate" name="login">
          <label for="login">Nom d'utilisateur</label>
        </div>
        <div class="input-field col3 s6">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
        <div class="input-field col3 s6">
          <i class="material-icons prefix">lock</i>
          <input id="confirm_password" type="password" class="validate" name="confirm_password">
          <label for="confirm_password">Conformation password</label>
        </div>
        <div class="input-field col3 s6">
        <button class="btn waves-effect #ef6c00 orange darken-3" type="submit" name="envoyer">Envoyer
            <i class="material-icons right">send</i>
        </button>
        <?php if($msg_error != ""){echo "<p>$msg_error</p>";}?>
        </div>

      </div>
    </form>
</main>

<?php require_once('../php/footer.php'); ?>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?= $root_js ?>js/materialize.min.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('../php/template.php'); ?>