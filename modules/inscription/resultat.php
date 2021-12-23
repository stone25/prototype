<?php 
session_start();
include_once('../blog/src/entity/connexion.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>JEC-CI | Inscription</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				
				<h1 style="color: green; text-align: center">Félicitations</h1>
				<h5 style="text-align: center">Voici votre numéro d'inscription <span style="color: red; "><?php echo $_SESSION['matricule']; ?></span> </h5>  
				<h6 style="text-align: center">En cas de perte de ce numéro, pas la peine de vous réinscire: Contactez le Bureau National</h6>
				
				<form class="login100-form validate-form" style="margin-top: 30px;" action='../src/control/inscription/inscription.php' method='POST'>
					
					<div class="container-login100-form-btn">
					<a href="../facture/facture.php" target="_blank" class="login100-form-btn"><i class="fa fa-download" style="margin-right: 20px;"></i> Télécharger fiche d'inscription</a>
						<a href="index.php" class="login100-form-btn" style="margin-top: 30px;"><i class="fa fa-user" style="margin-right: 20px;"></i> Nouveau membre</a>
						<a href="http://jec-ci.com" class="login100-form-btn" style="margin-top: 30px;"><i class="fa fa-external-link" style="margin-right: 20px;"></i> Visitez le site</a>
						
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>