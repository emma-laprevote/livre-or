<?php
session_start();
    
    $bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');
    
    $root_images = '';
    $root_profil = 'Pages/';
    $root_inscription = 'Pages/';
    $root_connexion = 'Pages/';
    $root_livreor = 'Pages/';
    $root_index = '';
    $root_css = '';
    $root_js = '';
?>

<?php $title = 'NOISE POLLUTION'; ?>

<?php ob_start(); ?>

  <?php require_once('php/header.php'); ?>

<main>
  <article>
    <?php 
    if(isset($_SESSION['login']) == "") { ?>

    <?php
    } elseif (isset($_SESSION['login']) != "") {

      $user = $_SESSION['login'];

    echo "<div class='membre'>
    <div class='container'>
            <div class='row'>
              <div id='iconeuser' class='col 5 s6'>
              <i class='medium material-icons #ffffff white-text'>account_box</i><p class='#ffffff white-text'>Welcome $user!</p>
              </div>
              <div id='buttonrow'>
                <a href='pages/profil.php' class='waves-effect #ffffff white #000000 black-text btn'><i class='material-icons left #000000 black-text'>flash_on</i>MON COMPTE</a>
                <a href='pages/livre-or.php' class='waves-effect #ffffff white #000000 black-text btn'><i class='material-icons left #000000 black-text'>flash_on</i>LIVRE D'OR</a>
              </div>
            </div>
      </div>
    </div>";
    
    }
    ?>

    <div class="photokraft"></div>

      <div class="presentation">

        <div class="titleslogan">
        <h1 class="slogan">La vie sans musique est tout simplement une erreur,<br>une fatigue, un exil.</h1>
        </div>


        <section class="acturow">

        <p class="flow-text"><strong>Noise pollution</strong> est à la fois une salle de concert, un club et un organisateur d’évènement qui investit la Ville.
        Crée en 2003, ce sont plus de 1300 concerts organisés et 4300 groupes et artistes programmés, pour plus de 750 000 personnes accueillies.<br>
        <br>
        La cohérence du projet repose sur un ADN identifiable, plus qu’une image c’est une identité forte qui est déclinée sur tous supports. La communication devient une composante essentielle, 
        elle vient conforter la qualité et les choix du projet.</p>

        <h1 class="titleprogramm">PROGRAMMATION</h1>

      <section class="programm">

      <div class="row">
        <div class="col s3 m3">
          <div class="card">
            <div class="card-image">
              <img id="card1" src="Images/card1.JPG" alt="photo Horror miami band">
            </div>
            <div class="card-content">
              <p>SAT.<strong>9</strong>.OCT</p><br>
              <p class="p2">NOISE POLLUTION - ROOM 1</p><br>
              <p><strong>HORROR MIAMI</strong></p>
            </div>
            <div class="card-action #000000 black">
              <a class="#ffffff white-text" href="#"><i class="material-icons #ffffff white-text">add</i>BUY TICKETS</a>
            </div>
          </div>
        </div>

        <div class="col s3 m3">
          <div class="card">
            <div class="card-image">
              <img id="card2" src="Images/card2.jpg" alt="photo Deftones band">
            </div>
            <div class="card-content">
              <p>TUE.<strong>6</strong>.DEC</p><br>
              <p class="p2">NOISE POLLUTION - ROOM 1</p><br>
              <p><strong>DEFTONES</strong></p>
            </div>
            <div class="card-action #000000 black">
              <a class="#ffffff white-text" href="#"><i class="material-icons #ffffff white-text">add</i>BUY TICKETS</a>
            </div>
          </div>
        </div>
      
        <div class="col s3 m3">
          <div class="card">
            <div class="card-image">
              <img id="card3" src="Images/card3.jpg" alt="photo Enter shikari band">
            </div>
            <div class="card-content">
              <p>TUE.<strong>28</strong>.APR</p><br>
              <p class="p2">NOISE POLLUTION - ROOM 1</p><br>
              <p><strong>ENTER SHIKARI</strong></p>
            </div>
            <div class="card-action #000000 black">
              <a class="#ffffff white-text" href="#"><i class="material-icons #ffffff white-text">add</i>BUY TICKETS</a>
            </div>
          </div>
        </div>

      <div class="col s3 m3">
          <div class="card">
            <div class="card-image">
              <img id="card3" src="Images/card4.jpg" alt="photo molecular collectif">
            </div>
            <div class="card-content">
              <p>FRI.<strong>16</strong>.JUN</p><br>
              <p class="p2">NOISE POLLUTION - LOLITA</p><br>
              <p><strong>MOLECULAR</strong></p>
            </div>
            <div class="card-action #000000 black">
              <a class="#ffffff white-text" href="#"><i class="material-icons #ffffff white-text">add</i>BUY TICKETS</a>
            </div>
          </div>
        </div>
      </div>
      </section> 
      
      <h1 class="titleprogramm">FOLLOW US</h1>

      </section>   

        <section class="icones">
            <a href="https://fr-fr.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://twitter.com/?lang=fr" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.mixcloud.com/" target="_blank"><i class="fab fa-mixcloud"></i></a>
            <a href="https://www.youtube.com/?gl=FR&hl=fr" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://open.spotify.com/user/razzmatazzclubs" target="_blank"><i class="fab fa-spotify"></i></a>

        </section>

      </div>
    </article>
</main>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?= $root_js ?>js/materialize.min.js"></script>
<?php require_once('php/footer.php'); ?>
            
<?php $content = ob_get_clean(); ?>

<?php require('php/template.php'); ?>
