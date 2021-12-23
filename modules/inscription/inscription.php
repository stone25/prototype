<?php 
session_start();
include_once('../src/entity/Connexion.php'); 
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
				<?php 
					if(isset($_GET['error']) && $_GET['error']==1) 
					{
						echo'<h4 style="color: red">Vérifier votre login et password</h4>';
					}
					else if(isset($_GET['error']) && $_GET['error']==2)
					{
						echo'<h4 style="color: red">Veuillez vous connecter</h4>';
					}
				?>
				<form class="login100-form validate-form" action='../src/control/inscription/inscription.php' method='POST' enctype="multipart/form-data">
					
					<span class="login100-form-avatar">
						<img src="images/logo.png" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="nom">
						<span class="focus-input100"  data-placeholder="Nom"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="text" name="prenom">
						<span class="focus-input100" data-placeholder="Prénoms"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<select class="input100" name="sexe">
							<option value="">*** Genre ***</option>
							<option value='H'>Homme</option>
							<option value='F'>Femme</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="date" name="date">
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="text" name="lieu">
						<span class="focus-input100" data-placeholder="Lieu de naissance"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="text" name="contact">
						<span class="focus-input100" data-placeholder="Contact"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="email" name="email">
						<span class="focus-input100" data-placeholder="e-mail"></span>
					</div>

					<div class="wrap-input100 validate-inpu m-b-50" data-validate="Enter password">
						<select class="input100" name="sang">
							<option value="">*** Groupe sanguin ***</option>
							<option>A-</option>
							<option>A+</option>
							<option>B-</option>
							<option>B+</option>
							<option>AB-</option>
							<option>AB+</option>
							<option>O-</option>
							<option>O+</option>
						</select>
					</div>

					<div class="wrap-input100 validate-inpu m-b-50" data-validate="Enter password">
						<input class="input100" type="text" name="cni">
						<span class="focus-input100" data-placeholder="Numero CNI ou Attestation"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<select class="input100" name="poste">
							<option value="">*** Responsabilité ***</option>
							<option>Responsable</option>
							<option>Vice Responsable</option>
							<option>Secrétaire Général(e)</option>
							<option>Secrétaire Général(e) Adjoint(e)</option>
							<option>Trésorier(ère)</option>
							<option>Trésorier(ère) Adjoint(e)</option>
							<option>Secrétaire à l'Organisation</option>
							<option>Secrétaire à l'Organisation Adjoint(e)</option>
							<?php if($_SESSION['instance']==1){echo"<option>Chargé(e) de Commununication</option><option>Chargé(e) de Commununication Adjoint(e)</option>";} ?>
							<option>Membre</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="file" name="file">
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="add-jeciste" class="login100-form-btn">
							Enregistrer
						</button>
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