<?php
session_start();
$msg_error = "";
    require_once('../php/functions.php');
    
    if(isset($_POST['envoyer']))
    {
        $msg_error = connectLogin();
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

<?php $title = 'CONNEXION'; ?>

<?php ob_start(); ?>

<?php require_once('../php/header.php'); ?>

<main id="formuInscription">

<h1 class="titleInscription">CONNEXION</h1>

<p class="sloganInscri" class="flow-text">Connecte-toi,<br>
    et suis les dernières tendances musicale_</p>

  <section class="Connectrow">
    <iframe width="350" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/518670234&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"></div>

    <form id="formConnect" class="col s12" method="POST" action="connexion.php">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="login" type="text" class="validate" name="login">
          <label for="login">Nom d'utilisateur</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
        <button class="btn waves-effect #ef6c00 orange darken-3" type="submit" name="envoyer">Envoyer
            <i class="material-icons right">send</i>
        </button>
        <?php if($msg_error != ""){echo "<p>$msg_error</p>";}?>
      </div>
    </form>
    </section>
</main>

<?php require_once('../php/footer.php'); ?>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('../php/template.php'); ?>