<?php
session_start();
$bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');
$action = "";
    require_once('../php/functions.php');

    $action = addComment ();

    $root_images = '../';
    $root_profil = '';
    $root_inscription = '';
    $root_connexion = '';
    $root_livreor = '';
    $root_index = '../';
    $root_css = '../';
    $root_js = '../';
?>

<?php $title = 'COMMENTAIRE'; ?>

<?php ob_start(); ?>

<?php require_once('../php/header.php'); ?>

<main>
  <article>
    <div class="photolivreor"></div>

    <div class="intro">
        <h3>Votre avis compte pour nous.</h3>
        <p class="flow-text">Nous avons décidé de mettre en ligne un livre d'or afin que tout le monde puisse partager son expérience
          dans nos locaux et en dehors. N'hésitez pas à nous faire des retours si vous en avez, si vous souhaitez la venue d'un de vos 
          artistes favoris sur notre scène, ou pour pleins d'autres choses, ça se passe, ici maintenant !<br> 
        </p>
      </div>

    <div class="livreor">

        <h1 class="titlelivre">COMMENTAIRE</h1>

        <div class="elementrow">
        <?php
          if (isset($_SESSION['login']) != "") {

          $user = $_SESSION['login'];

        echo "<div class='row'>
        <div class='col s12 m12'>
          <div class='card'>
            <div class='card-content'>
            <i id='iconeUser2' class='large material-icons'>account_box</i>
              <p class='puser'>HELLO <strong>$user</strong>!</p><br>
            </div>
            <div class='card-action #bf360c deep-orange darken-4'>
              <a href='profil.php' class='#ffffff white-text'><i class='material-icons #ffffff white-text'>add</i>MON PROFIL</a>
            </div>
          </div>
        </div>
        </div>";

          }
          ?>
    
    <form class="col s12" method="POST" action="commentaire.php">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="comment" class="materialize-textarea" type="textearea" name="comment" class="validate" required></textarea>
          <label for="comment">Message</label>
          <button class="btn waves-effect #000000 black #ffffff white-text" type="submit" name="envoyer">Envoyer
            <i class="material-icons right">send</i>
         </button>
         <?php if($action != ""){echo "<p>$action</p>";}?>
        </div>
      </div>
    </form>
  </div>
  </article>
</main>

<?php require_once('../php/footer.php'); ?>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('../php/template.php'); ?>