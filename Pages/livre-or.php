<?php
session_start();
$bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');
$view = $bdd->prepare("SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs WHERE commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.id DESC");
$view->execute(array());

    $root_images = '../';
    $root_profil = '';
    $root_inscription = '';
    $root_connexion = '';
    $root_livreor = '';
    $root_index = '../';
    $root_css = '../';
    $root_js = '../';
?>

<?php $title = 'LIVRE D\'OR'; ?>

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
        <h1 class="titlelivre">LIVRE D'OR</h1>

      <div class="livrerow">
        <?php
          if (isset($_SESSION['login']) != "") {

          $user = $_SESSION['login'];

        echo "<div class='cardCo' class='row'>
        <div class='col s3 m3'>
          <div class='card'>
            <div class='card-content'>
            <i id='iconeUser' class='large material-icons'>account_box</i>
              <p class='puser'>HELLO <strong>$user</strong>!</p><br>
            </div>
            <div class='card-action #bf360c deep-orange darken-4'>
              <a href='commentaire.php' class='#ffffff white-text'><i class='material-icons #ffffff white-text'>add</i>ADD COMMENT</a>
            </div>
          </div>
        </div>
        </div>";

          } elseif (isset($_SESSION['login']) == '') {

            echo "<div class='cardCo' class='row'>
            <div class='col s3 m3'>
              <div class='card'>
              <p id='connectpeople'><span id='spanCard'>Rejoins-nous</span><br>et donne ton avis!</p>
                <div id='lienslivre' class='card-content'>
                  <a href='connexion.php' class='waves-effect #bf360c deep-orange darken-4 #ffffff white-text btn'>Connexion</a>
                  <a href='inscription.php' class='waves-effect #bf360c deep-orange darken-4 #ffffff white-text btn'>Sign up</a>
                </div>
              </div>
            </div>
            </div>";
          }
          ?>
        <div class="afficheColumn">
          <?php while($commentView = $view->fetch(PDO::FETCH_ASSOC)) { ?>

          <table>
            <tr>
              <td id="titleTable"><strong><?php echo $commentView['login'];?></strong> a commenté le <?php echo $commentView['date']; ?></td>
            </tr>
            <tr>
              <td id="commentTable"><?php echo $commentView['commentaire']; ?><br></td>
            </tr>
          </table>
          
        <?php
          }
        ?>
        </div>
      </div>
    </div>
  </article>
</main>

<?php require_once('../php/footer.php'); ?>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require('../php/template.php'); ?>