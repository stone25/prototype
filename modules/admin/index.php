<?php
session_start();
$titre = 'Authentification';
$page = '';
?>

<!doctype html>
<html class="no-js" lang="fr">

<!-- ***** Head Area Start ***** -->
<?php include_once('include/head.php'); ?>
<!-- ***** Head Area End ***** -->

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center m-b-md custom-login">
        <h3><img class="main-logo" src="img/logo/logo.png" alt="" /></h3>
        <p>Authentifiez-vous pour accéder aux informations</p>
        <?php if(isset($_SESSION["message"])){echo "<p style='color: red'>$_SESSION[message]</p>"; $_SESSION["message"]='';} ?>
      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <form action="../src/control/admin/utilisateur.php" method="POST" id="loginForm">
                <div class="form-group">
                    <label class="control-label" for="username">Matricule</label>
                    <input type="text" placeholder="18JEC-CI0000H" name="matricule" title="Please enter you username" required="" value="" class="form-control">
                    <span class="help-block small">Matricule sur la carte JEC</span>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe</label>
                    <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" class="form-control">
                    <span class="help-block small"></span>
                </div>
                <!--div class="checkbox login-checkbox">
                    <label>
                <input type="checkbox" class="i-checks"> Remember me </label>
                    <p class="help-block small">(if this is a private computer)</p>
                </div-->
                <button class="btn btn-success btn-block loginbtn" name="btn-connexion" id=connexion>Connexion</button>
                <a class="btn btn-default btn-block" href="#">Mot de passe oublié</a>
            </form>
          </div>
      </div>
      </div>
      <div class="text-center login-footer">
        <p>Copyright © 2019. Tous droits reservés. <a href="https://jec-ci.com">JEC Côte d'Ivoire</a></p>
      </div>
    </div>   
    </div>
       <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- notification JS
		============================================ -->
    <script src="js/notifications/Lobibox.js"></script>
    <script src="js/notifications/notification-active.js"></script>
</body>

</html>