<footer class="page-footer #000000 black">
          <div class="container">
            <div class="row">
              <div class="col l0 s6">
                <img id="logo2" src="<?= $root_images ?>Images/logo2.png" alt="logo 2 noise pollution">
                <p class="adress" class="flow-text">C/ Pamplona 88, 1er piso<br>
                08018, Barcelona<br>
                Tel. (+34) 933 208 200<br>
                infonoise@salanoisepollution.com</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="<?= $root_index ?>index.php"><i class="material-icons #ffffff white-text">add</i>ACCUEIL</a></li>
                  <?php if (isset($_SESSION['login']) == "" ) { ?>
                  <li><a class="grey-text text-lighten-3" href="<?= $root_inscription ?>inscription.php"><i class="material-icons #ffffff white-text">add</i>INSCRIPTION</a></li>
                  <li><a class="grey-text text-lighten-3" href="<?= $root_connexion ?>connexion.php"><i class="material-icons #ffffff white-text">add</i>CONNEXION</a></li>
                  <?php
                    } elseif(isset($_SESSION['login']) != "") { ?>
                      
                      <li><a class="grey-text text-lighten-3" href="<?= $root_livreor ?>livre-or.php"><i class="material-icons #ffffff white-text">add</i>LIVRE D'OR</a></li>
                      
                    <?php
                    }
                    ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2020 Emma Laprevote
            </div>
          </div>
        </footer>