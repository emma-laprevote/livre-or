<header>
<nav>
    <div id="navbar" class="nav-wrapper #ffffff white">
      <img id="logonoise" src="<?= $root_images ?>Images/noisepollution.png" alt="logo noise pollution">
      <ul class="right hide-on-med-and-down">
      <?php if(isset($_SESSION['login']) == "") { ?>

      <?php
      } else { ?>
      <li><form  method="POST" action="<?= $root_profil ?>profil.php">
        <button class="btn waves-effect #000000 black #ffffff white-text btn" type="submit" name="deconnect">Déconnexion
        </button></form></li>
        <?php
          }
            if(isset($_POST['deconnect'])) {
                session_destroy();
                header("Location: $root_index"."index.php");
          }
        ?>
        <li><a href="<?= $root_index ?>index.php" class="waves-effect #000000 black #ffffff white-text btn">Accueil</a></li>
        <?php if (isset($_SESSION['login']) == "" ) { ?>
          <li><a href="<?= $root_inscription ?>inscription.php" class="waves-effect #000000 black #ffffff white-text btn">Inscription</a></li>
          <li><a href="<?= $root_connexion ?>connexion.php" class="waves-effect #000000 black #ffffff white-text btn">Connexion</a></li>
          <li><a href="<?= $root_livreor ?>livre-or.php" class="waves-effect #000000 black #ffffff white-text btn">Livre d'or</a></li>
        <?php
        } else {

        }
        ?>
        <li><a href="https://fr-fr.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://twitter.com/?lang=fr" target="_blank"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://www.mixcloud.com/" target="_blank"><i class="fab fa-mixcloud"></i></a></li>
      </ul>
    </div>
  </nav>
</header>